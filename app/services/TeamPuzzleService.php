<?php

class TeamPuzzleService{
    private TeamPuzzleRepository $teamPuzzleRepository;
    public function __construct()
    {
        $this->teamPuzzleRepository = new TeamPuzzleRepository();
    }

    public function getTeamPuzzlesByTeamIdAndTopicId($topic_id): array{
        $team_id = $_SESSION['person_id'];

        return $this->teamPuzzleRepository->getTeamPuzzlesByTeamIdAndTopicId($team_id, $topic_id);
    }

    public function updateLotteIsDoneByTeamId(): bool{
        $team_id = $_SESSION['person_id'];
        return $this->teamPuzzleRepository->updateTopicAtLotteIsDoneByTeamId($team_id);
    }

    public function updateTeamIsDoneByTopicIdAndTeamId($topic_id, $is_done): array{
        $team_id = $_SESSION['person_id'];
        $isDoneMentor = $this->teamPuzzleRepository->updateTeamIsDoneByTopicIdAndTeamId($topic_id, $team_id, $is_done);

        return array(
            'is_done_mentor' => $isDoneMentor,
        );
    }

    public function updateTimeFineByTopicIdAndTeamId($topic_id): array{
        $team_id = $_SESSION['person_id'];
        $time_fine = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time_fine->modify('+3 minutes');
        $formatted_time_fine = $time_fine->format('Y-m-d H:i:s');
        $data = $this->teamPuzzleRepository->updateTimeFineByTopicIdAndTeamId($topic_id, $team_id, $formatted_time_fine);

        return array(
            'time_fine' => $formatted_time_fine,
            'isUpdateSuccess' => $data
        );
    }

    public function checkTeamIsDoneByTopicIdAndTeamId($topic_id): bool{
        $team_id = $_SESSION['person_id'];
        return $this->teamPuzzleRepository->checkTeamIsDoneByTopicIdAndTeamId($topic_id, $team_id);
    }

    public function getTeamIsDoneByLocationId($location_id): array{
        return $this->teamPuzzleRepository->getTeamIsDoneByLocationId($location_id);
    }

    public function getTeamIsNotDoneByLocationId($location_id): array{
        return $this->teamPuzzleRepository->getTeamIsNotDoneByLocationId($location_id);
    }
}

?>