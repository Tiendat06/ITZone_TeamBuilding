<?php

class LocationService{
    private LocationRepository $locationRepository;
    private TopicRepository $topicRepository;
    private TeamPuzzleRepository $teamPuzzleRepository;
    private PersonRepository $personRepository;
    public function __construct()
    {
        $this->locationRepository = new LocationRepository();
        $this->topicRepository = new TopicRepository();
        $this->teamPuzzleRepository = new TeamPuzzleRepository();
        $this->personRepository = new PersonRepository();
    }

    public function getLocations(): array {
        return $this->locationRepository->getLocations();
    }

    public function getLocationByLocationId($location_id): array{
        $location_data = $this->locationRepository->getLocationByLocationId($location_id);

        return array(
            'location_name' => $location_data->getLocationName(),
            'location_map' => $location_data->getLocationMap(),
            'location_img' => $location_data->getLocationImg(),
            'location_address' => $location_data->getLocationAddress(),
            'bus_go' => $location_data->getBusGo()
        );
    }

    public function index($location_id): array{
        $topic = $this->topicRepository->getTopicByLocationId($location_id);
        $topic_id = $topic->getTopicId();
        $topic_link = $topic->getTopicLink();
        $team_id = $_SESSION['person_id'];
        $team_puzzle = $this->teamPuzzleRepository->getTeamPuzzlesByTeamIdAndTopicId($team_id, $topic_id);
        $team_end_topic = $team_puzzle['time_end'];

        if(!$this->teamPuzzleRepository->isTeamClickedTopicByTeamIdAndTopicId($team_id, $topic_id)){
            $time_end = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
            $time_end->modify('+30 minutes 3 seconds');
            $formatted_time_end = $time_end->format('Y-m-d H:i:s');
            $team_end_topic = $formatted_time_end;

            $this->teamPuzzleRepository->updateTeamFirstClickTopicByTeamIdAndTopicId($team_id, $topic_id, $formatted_time_end);
        }

        return array(
            "time_end" => $team_end_topic,
            "topic_id" => $topic_id,
            "topic_link" => $topic_link,
        );
    }

    public function checkTopicAnswerIsCorrect($topic_answer, $location_id): array{
        $trim_topic_answer = preg_replace('/\s+/', '', $topic_answer);

        $location = $this->locationRepository->getLocationByLocationId($location_id);
        $topic = $this->topicRepository->getTopicByLocationId($location_id);
        $topic_answer_db = $topic->getTopicAnswer();
        $location_address = $location->getLocationAddress();
        $location_name = $location->getLocationName();
        $new_topic_answer = '';

        if(strlen($trim_topic_answer) < strlen($topic_answer_db)){
            return array(
                'is_correct' => $topic_answer_db === $new_topic_answer,
            );
        }

        for($i = 0; $i < strlen($topic_answer_db); $i++){
            $new_topic_answer .= $trim_topic_answer[$i];
        }

        return array(
            'is_correct' => $topic_answer_db === $new_topic_answer,
            'location_address' => $location_address,
            'location_name' => $location_name
        );
    }

    public function getAnswerByLocationId($location_id): Location{
        return $this->locationRepository->getLocationByLocationId($location_id);
    }

    public function checkMentorKey($topic_answer): array{
        $team_id = $_SESSION['person_id'];
        $team_member = $this->personRepository->getTeamMemberByTeamIdOrMentorId($team_id);

        return array(
            'is_correct' => $this->personRepository->checkMentorByTeamId($team_id, $topic_answer),
            'team_member' => $team_member,
        );
    }

    public function getLocationDataByPersonId(): Location {
        $person_id = $_SESSION['person_id'];
        return $this->locationRepository->getLocationDataByPersonId($person_id);
    }

}

?>