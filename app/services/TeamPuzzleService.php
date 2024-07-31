<?php

class TeamPuzzleService{
    private TeamPuzzleRepository $teamPuzzleRepository;
    public function __construct()
    {
        $this->teamPuzzleRepository = new TeamPuzzleRepository();
    }

    public function getTeamPuzzlesByTeamIdAndTopicId($team_id, $topic_id): array{
        return $this->teamPuzzleRepository->getTeamPuzzlesByTeamIdAndTopicId($team_id, $topic_id);
    }
}

?>