<?php

class PersonService{
    private PersonRepository $personRepository;
    private TeamArrivalRepository $teamArrivalRepository;
    private LocationRepository $locationRepository;
    private TopicRepository $topicRepository;
    private TeamMemberRepository $teamMemberRepository;
    private TeamPuzzleRepository $teamPuzzleRepository;
    private TeamStationRepository $teamStationRepository;
    private LocationService $locationService;
    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->teamArrivalRepository = new TeamArrivalRepository();
        $this->locationRepository = new LocationRepository();
        $this->topicRepository = new TopicRepository();
        $this->teamMemberRepository = new TeamMemberRepository();
        $this->teamPuzzleRepository = new TeamPuzzleRepository();
        $this->teamStationRepository = new TeamStationRepository();
        $this->locationService = new LocationService();

    }

    public function getTeam(): array{
        return $this->personRepository->getTeam();
    }

    public function getTeamMemberByTeamIdOrMentorId($team_id, $operation='team'): array{
        return $this->personRepository->getTeamMemberByTeamIdOrMentorId($team_id, $operation);
    }

    public function getPersonNameByPersonId($person_id, $role_name){
        return $this->personRepository->getPersonNameByPersonId($person_id, $role_name);
    }

    public function unlockNextLocation($team_id, $mentor_id, $next_priority, $inputKey, $location_id, $is_success): array{
        $mentor = $this->personRepository->getMentorByMentorId($mentor_id);
        $mentor_key = $mentor->getMentorKey();
        $previous_priority = $next_priority - 1;

        $previous_location_id = $this->teamArrivalRepository->getLocationIdByPreviousPriorityAndTeamId($previous_priority, $team_id);
        $previous_topic_data = $this->topicRepository->getTopicByLocationId($previous_location_id);
        $previous_topic_id = $previous_topic_data->getTopicId();

        $totalIsShowPreviousPriority = $this->teamArrivalRepository->checkPreviousPriorityIsShowNextLocationByTeamId($team_id, $previous_priority);

        $totalIsDonePreviousPriority = $this->teamPuzzleRepository->countTeamIsDoneNotNullByTopicIdAndTeamId($previous_topic_id, $team_id);
        if($mentor_key === $inputKey){
            if($totalIsShowPreviousPriority > 0){
                if($totalIsDonePreviousPriority > 0){
                    $this->teamArrivalRepository->updateIsShowNextLocationByTeamId($team_id, $next_priority);
                    $this->teamArrivalRepository->updateIsOpenNextLocationByTeamIdAndLocationId($team_id, $location_id);
                    $this->teamStationRepository->updateTeamIsDoneByTeamIdAndLocationId($team_id, $location_id);
                } else{
                    return array(
                        'status' => false,
                        'message' => 'Team chưa hoàn thành mật thư trước đó'
                    );
                }
            } else {
                return array(
                    'status' => false,
                    'message' => 'Team này đã đi sai lộ trình'
                );
            }
        } else{
            return array(
                'status' => false,
                'message' => 'Sai mã định danh mentor'
            );
        }
        if ($is_success) {
            $this->teamStationRepository->updateTeamIsSuccessByTeamIdAndLocationId($team_id, $location_id);
        }
        return array(
            'status' => true,
            'message' => 'Mở khóa thành công, chờ 3s để cập nhật'
        );
    }

    public function getMentorWhileTeamIsDoneMentorGameByTeamId(): Mentor{
        $team_id = $_SESSION['person_id'];
        return $this->personRepository->getMentorWhileTeamIsDoneMentorGameByTeamId($team_id);
    }

    public function getTeamMemberByTeamId(): array{
        $team_id = $_SESSION['person_id'];
        return $this->personRepository->getTeamMemberByTeamId($team_id);
    }

    public function getMentorByMentorId(): Mentor{
        $mentor_id = $_SESSION['person_id'];
        return $this->personRepository->getMentorByMentorId($mentor_id);
    }

    public function getAllMentor(): array
    {
        return $this->personRepository->getAllMentor();
    }

    public function getAllGuard(): array
    {
        return $this->personRepository->getAllGuard();
    }

    public function getTeamMemberWhileDoneMentorGame(): array{
        $mentor_id = $_SESSION['person_id'];
        $team = $this->personRepository->getTeamMemberByTeamIdOrMentorId($mentor_id, 'mentor');
        $team_id = $team['team_id'];
        $location = $this->locationRepository->getLocationDataByPersonId($mentor_id);
        $topic = $this->topicRepository->getTopicByLocationId($location->getLocationId());

        return $this->teamMemberRepository->getTeamMemberAndTeamPuzzleByTeamIdAndTopicId($team_id, $topic->getTopicId());
    }

   public function updateSpecialStationResult($team_id, $location_id, $is_success): array {
    try {
        // Update trạng thái is_done
        $this->teamStationRepository->updateTeamIsDoneByTeamIdAndLocationId($team_id, $location_id);
        if($is_success){
        $this->teamStationRepository->updateTeamIsSuccessByTeamIdAndLocationId(
            $team_id,
            $location_id
        );
        }
        return [
            'status'  => true,
            'message' => 'Cập nhật trạm đặc biệt thành công',
            'is_success' => $is_success
        ];
    } catch (Throwable $e) {
        error_log("updateSpecialStationResult error: " . $e->getMessage());
        return [
            'status'  => false,
            'message' => 'Lỗi khi cập nhật trạm đặc biệt: ' . $e->getMessage()
        ];
    }
}
public function activateSpecialPuzzle($team_id): array {
   //check xem có hoàn thành thử thách ở trạm lotte chưa
    $isDoneLotte = $this->teamStationRepository->checkTeamIsDone($team_id, 'LOC0000001');
    //check xem trạm lotte có thành công không
    $isSuccessLotte = $this->teamStationRepository->checkTeamIsSuccess($team_id, 'LOC0000001');
    //check xem trạm đặc biệt đã hoàn thành chưa
    $isDoneSpecial = $this->teamStationRepository->checkTeamIsDone($team_id,'LOC0000013');
    //check xem trạm đặc biệt có thành công không
    $isSuccessSpecial = $this->teamStationRepository->checkTeamIsSuccess($team_id,'LOC0000013');
    //nếu hoàn thành trạm lotte và thành công hoặc trạm đặt biệt thì mới mở mật thư đặt biệt 
    if(($isDoneLotte && $isSuccessLotte) || ($isDoneSpecial && $isSuccessSpecial)){
        $this->teamArrivalRepository->updateIsShowNextLocationByLocationIdAndTeamId('LOC0000013',$team_id);
        return array(
            'status' => true,
            'message' => 'Kích hoạt mật thư đặc biệt thành công'
        );
    } else{
        return array(
            'status' => false,
            'message' => 'Chưa hoàn thành thử thách ở trạm Lotte hoặc trạm đặc biệt đã được kích hoạt'
        );
    }
}
public function activateSpecialPuzzleInput(): array {
        $opened = $this->teamArrivalRepository->openAllSpecialStations();

        if ($opened) {
            return [
                'status' => true,
                'message' => 'Kích hoạt ô nhập mật thư đặc biệt thành công'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Không có đội nào được kích hoạt'
            ];
        }
}
public function solveSpecialPuzzle($team_id, $answer): array {
    // Lấy topic đặc biệt
    $special_topic = $this->topicRepository->getTopicByLocationId('LOC0000013');
    if (!$special_topic) {
        return [
            'status'  => false,
            'message' => 'Không tìm thấy topic đặc biệt'
        ];
    }
    $puzzle = $this->teamPuzzleRepository
                   ->getTeamPuzzlesByTeamIdAndTopicId($team_id, $special_topic->getTopicId());

    if (!$puzzle) {
        return [
            'status'  => false,
            'message' => 'Không tìm thấy dữ liệu mật thư đặc biệt'
        ];
    }

    $currentClick = (int) $puzzle['is_clicked'];
    // Nếu đã bị khóa sau 3 lần sai
    if ($currentClick === 4) {
        return [
            'status'  => false,
            'message' => 'Bạn đã hết số lần nhập đáp án'
        ];
    }
    //Gọi service kiểm tra đáp án
    $check = $this->locationService->checkTopicAnswerIsCorrect($answer, 'LOC0000013');

    if (!empty($check['is_correct']) && $check['is_correct'] === true) {
        // Thành công
        $this->teamPuzzleRepository->solveSpecialPuzzleSuccess($team_id);
        return [
            'status'  => true,
            'message' => 'Chúc mừng! Bạn đã giải đúng mật thư đặc biệt.'
        ];
    } else {
        $newClick = $this->teamPuzzleRepository->incrementSpecialPuzzleClick($team_id);

        if ($newClick === 4) {
            return [
                'status'  => false,
                'message' => 'Sai lần thứ 3. Ô nhập đã bị khóa.',
                'attempts_left' => 0
            ];
        }
        return [
            'status'  => false,
            'message' => "Sai rồi! Bạn còn " . (3 - $newClick) . " lần thử.",
            'attempts_left' => 3 - $newClick
        ];
    }
}
// //Lấy mật thư đặc biệt
public function getSpecialPuzzle(): array {
    $team_id = $_SESSION['person_id'];
    $specialArrival = $this->teamArrivalRepository->getSpecialStationByTeamId($team_id);
    if (empty($specialArrival)) {
        return [
            'status'  => false,
            'message' => 'Team chưa có quyền truy cập trạm đặc biệt'
        ];
    }
    $special_topic = $this->topicRepository->getTopicByLocationId('LOC0000013');
    
    if (!$special_topic) {
        return [
            'status'  => false,
            'message' => 'Không tìm thấy topic đặc biệt'
        ];
    }
    $is_input_open = (int)$specialArrival[0]['is_open_next_location'] === 1;
    //check đội này đã hoàn thành mật thư đặt biệt chưa
    $puzzle = $this->teamPuzzleRepository
                   ->getTeamPuzzlesByTeamIdAndTopicId($team_id, $special_topic->getTopicId());
    $is_done = (int) $puzzle['is_done'];
    return [
    'status' => true,
    'data'   => [
        'topic_id'     => $special_topic->getTopicId(),
        'topic_link'   => $special_topic->getTopicLink(),
        'topic_answer' => $special_topic->getTopicAnswer(),
        'topic_img'    => $special_topic->getTopicImg(),
        'location_id'  => $special_topic->getLocationId(),
    ],
    'is_input_open' => $is_input_open,
    'is_done' => $is_done
];

}
}
?>