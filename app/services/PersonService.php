<?php

class PersonService{
    private PersonRepository $personRepository;
    private TeamArrivalRepository $teamArrivalRepository;
    private LocationRepository $locationRepository;
    private TopicRepository $topicRepository;
    private TeamMemberRepository $teamMemberRepository;
    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->teamArrivalRepository = new TeamArrivalRepository();
        $this->locationRepository = new LocationRepository();
        $this->topicRepository = new TopicRepository();
        $this->teamMemberRepository = new TeamMemberRepository();
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

    public function unlockNextLocation($team_id, $mentor_id, $next_priority, $inputKey, $location_id): array{
        $mentor = $this->personRepository->getMentorByMentorId($mentor_id);
        $mentor_key = $mentor->getMentorKey();
        $previous_priority = $next_priority - 1;

        $totalIsShowPreviousPriority = $this->teamArrivalRepository->checkPreviousPriorityIsShowNextLocationByTeamId($team_id, $previous_priority);
        if($mentor_key === $inputKey){
            if($totalIsShowPreviousPriority > 0){
                $this->teamArrivalRepository->updateIsShowNextLocationByTeamId($team_id, $next_priority);
                $this->teamArrivalRepository->updateIsOpenNextLocationByTeamIdAndLocationId($team_id, $location_id);
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
}

?>