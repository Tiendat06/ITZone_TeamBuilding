<?php

class TeamArrival {
    private string $team_arrival_id;
    private string $team_id;
    private string $location_id;
    private bool $is_show_next_location;
    private int $team_arrival_priority;

    public function __construct($team_arrival_id, $team_id, $location_id, $is_show_next_location, $team_arrival_priority) {
        $this->team_arrival_id = $team_arrival_id;
        $this->team_id = $team_id;
        $this->location_id = $location_id;
        $this->is_show_next_location = $is_show_next_location;
        $this->team_arrival_priority = $team_arrival_priority;
    }

    public function getTeamArrivalId() {
        return $this->team_arrival_id;
    }

    public function getTeamId() {
        return $this->team_id;
    }

    public function getLocationId() {
        return $this->location_id;
    }

    public function getIsShowNextLocation(): int {
        return $this->is_show_next_location ? 1: 0;
    }

    public function getTeamArrivalPriority(): int {
        return $this->team_arrival_priority;
    }

    public function setTeamArrivalId($new_team_arrival_id) {
        $this->team_arrival_id = $new_team_arrival_id;
    }

    public function setTeamId($new_team_id) {
        $this->team_id = $new_team_id;
    }

    public function setLocationId($new_location_id) {
        $this->location_id = $new_location_id;
    }

    public function setIsShowNextLocation($is_show_next_location) {
        $this->is_show_next_location = $is_show_next_location;
    }

    public function setTeamArrivalPriority($new_team_arrival_priority) {
        $this->team_arrival_priority = $new_team_arrival_priority;
    }
}

?>