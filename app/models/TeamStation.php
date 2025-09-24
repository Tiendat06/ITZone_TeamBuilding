<?php

class TeamStation {
    private string $team_station_id;
    private string $team_id;
    private string $location_id;
    private bool $is_done;
    private bool $is_success; 

    public function __construct(
        $team_station_id,
        $team_id,
        $location_id,
        $is_done = false,
        $is_success = false
    ) {
        $this->team_station_id = $team_station_id;
        $this->team_id = $team_id;
        $this->location_id = $location_id;
        $this->is_done = $is_done;
        $this->is_success = $is_success;
    }

    // Getter
    public function getTeamStationId() {
        return $this->team_station_id;
    }

    public function getTeamId() {
        return $this->team_id;
    }

    public function getLocationId() {
        return $this->location_id;
    }

    public function isDone(): int {
        return $this->is_done ? 1 : 0;
    }

    public function isSuccess(): int {
        return $this->is_success ? 1 : 0;
    }

    // Setter
    public function setTeamStationId($team_station_id) {
        $this->team_station_id = $team_station_id;
    }

    public function setTeamId($team_id) {
        $this->team_id = $team_id;
    }

    public function setLocationId($location_id) {
        $this->location_id = $location_id;
    }

    public function setIsDone($is_done) {
        $this->is_done = $is_done;
    }
    public function setIsSuccess($is_success) {
        $this->is_success = $is_success;
    }
}

?>
