<?php

class LocationService{
    private LocationRepository $locationRepository;
    private TopicRepository $topicRepository;
    private TeamPuzzleRepository $teamPuzzleRepository;
    public function __construct()
    {
        $this->locationRepository = new LocationRepository();
        $this->topicRepository = new TopicRepository();
        $this->teamPuzzleRepository = new TeamPuzzleRepository();
    }

    public function getLocations(): array {
        return $this->locationRepository->getLocations();
    }

    public function index($location_id): array{
        $topic = $this->topicRepository->getTopicByLocationId($location_id);
        $topic_id = $topic->getTopicId();
        $team_id = 'TEA0000001';
        $team_puzzle = $this->teamPuzzleRepository->getTeamPuzzlesByTeamIdAndTopicId($team_id, $topic_id);
        $team_end_topic = $team_puzzle['time_end'];

        if(!$this->teamPuzzleRepository->isTeamClickedTopicByTeamIdAndTopicId($team_id, $topic_id)){
            $time_end = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
            $time_end->modify('+30 minutes');
            $formatted_time_end = $time_end->format('Y-m-d H:i:s');
            $team_end_topic = $formatted_time_end;

            $this->teamPuzzleRepository->updateTeamFirstClickTopicByTeamIdAndTopicId($team_id, $topic_id, $formatted_time_end);
        }

        return array(
            "time_end" => $team_end_topic,
            "topic_id" => $topic_id
        );
    }

    public function checkTopicAnswerIsCorrect($topic_answer, $location_id): array{
        $trim_topic_answer = preg_replace('/\s+/', '', $topic_answer);

        $location = $this->locationRepository->getLocationByLocationId($location_id);
        $topic = $this->topicRepository->getTopicByLocationId($location_id);
        $topic_answer_db = $topic->getTopicAnswer();
        $location_address = $location->getLocationAddress();
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
            'location_address' => $location_address
        );
    }



}

?>