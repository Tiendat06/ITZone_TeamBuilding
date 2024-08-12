<?php

class TeamMember {
    private string $team_member_id;
    private string $team_member_name;
    private string $team_member_gender;
    private string $team_member_phone;
    private string $team_id;

    public function __construct($team_member_id, $team_member_name, $team_member_gender, $team_member_phone, $team_id){
        $this->team_member_id = $team_member_id;
        $this->team_member_name = $team_member_name;
        $this->team_member_gender = $team_member_gender;
        $this->team_member_phone = $team_member_phone;
        $this->team_id = $team_id;
    }

    public function getTeamMemberId() {
        return $this->team_member_id;
    }

    public function getTeamMemberName() {
        return $this->team_member_name;
    }

    public function getTeamMemberGender() {
        return $this->team_member_gender;
    }

    public function getTeamMemberPhone() {
        return $this->team_member_phone;
    }

    public function getTeamId() {
        return $this->team_id;
    }

    public function setTeamMemberId($team_member_id) {
        $this->team_member_id = $team_member_id;
    }

    public function setTeamMemberName($team_member_name) {
        $this->team_member_name = $team_member_name;
    }

    public function setTeamMemberGender($team_member_gender) {
        $this->team_member_gender = $team_member_gender;
    }

    public function setTeamMemberPhone($team_member_phone) {
        $this->team_member_phone = $team_member_phone;
    }

    public function setTeamId($team_id) {
        $this->team_id = $team_id;
    }
}

?>