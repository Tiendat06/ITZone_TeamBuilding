<?php

class TeamPuzzle{
    private string $team_puzzle_id;
    private string $team_id;
    private string $topic_id;
    private DateTime $time_end;
    private DateTime $time_fine;
    private bool $is_done;
    private bool $is_clicked;

    public function __construct($team_puzzle_id, $team_id, $topic_id, $time_end, $time_fine, $is_done, $is_clicked){
        $this->team_puzzle_id = $team_puzzle_id;
        $this->team_id = $team_id;
        $this->topic_id = $topic_id;
//        $this->time_end = $time_end;
//        $this->time_fine = $time_fine;
        $this->setTimeEnd($time_end);
        $this->setTimeFine($time_fine);
        $this->is_done = $is_done;
        $this->is_clicked = $is_clicked;
    }

    public function getTeamPuzzleId(){
        return $this->team_puzzle_id;
    }

    public function getTeamId(){
        return $this->team_id;
    }

    public function getTopicId(){
        return $this->topic_id;
    }

    public function getTimeEnd(){
        return $this->time_end;
    }

    public function getTimeFine(){
        return $this->time_fine;
    }

    public function isDone(): int{
        return $this->is_done? 1: 0;
    }

    public function getIsClicked(): int{
        return $this->is_clicked ? 1: 0;
    }

    public function setTeamPuzzleId($team_puzzle_id){
        $this->team_puzzle_id = $team_puzzle_id;
    }

    public function setTeamId($team_id){
        $this->team_id = $team_id;
    }

    public function setTopicId($topic_id){
        $this->topic_id = $topic_id;
    }

    public function setTimeEnd($time_end){
        if (!$time_end instanceof DateTime) {
            $time_end = new DateTime($time_end);
        }
        $this->time_end = $time_end;
    }

    public function setTimeFine($time_fine){
        if (!$time_fine instanceof DateTime) {
            $time_fine = new DateTime($time_fine);
        }
        $this->time_fine = $time_fine;
    }

    public function setIsDone($is_done){
        $this->is_done = $is_done;
    }

    public function setIsClicked($is_clicked){
        $this->is_clicked = $is_clicked;
    }
}

?>