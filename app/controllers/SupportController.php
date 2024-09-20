<?php

class SupportController{

    private PersonService $personService;
    private TeamMemberService $teamMemberService;
    private TeamPuzzleService $teamPuzzleService;
    public function __construct()
    {
        $this->personService = new PersonService();
        $this->teamMemberService = new TeamMemberService();
        $this->teamPuzzleService = new TeamPuzzleService();
    }

//    [GET] /support
    public function index(){
        $mentors = $this->personService->getAllMentor();
        $guards = $this->personService->getAllGuard();
        $content = 'support';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /support/question
    public function question(){

        $content = 'support-question';
        $footer = 'question';
        include "./views/layout/index.php";
    }

//    [GET] /support/team
    public function team_control()
    {
        $content = 'support-team';
        $footer = 'team';
        include "./views/layout/index.php";
    }

//    [GET] /support/rule
    public function support_rule(){
        $content = 'support-rule';
        $footer = 'rule';
        include "./views/layout/index.php";
    }

//    [POST,FETCH] /support/get-team-member
    public function team_control_member($team_id)
    {
        $team_member_arrival = $this->teamMemberService->getTeamMemberInSupportControl($team_id);
        $team_member = $team_member_arrival['team_member'];
        ob_start();
        require("./views/support/support_control_team_member.php");
        $team_member_html = ob_get_clean();
        echo json_encode(array(
            'status' => true,
            "team_arrival" => $team_member_arrival['team_arrival'],
            "team_member" => $team_member_html,
            "team_mentor" => $team_member_arrival['team_mentor']
        ));

    }

    //[POST, FETCH] /support/get-team-question
    public function get_team_question($location_id){
        $team_is_done = $this->teamPuzzleService->getTeamIsDoneByLocationId($location_id);
        $team_is_not_done = $this->teamPuzzleService->getTeamIsNotDoneByLocationId($location_id);

        echo json_encode(array(
            'status' => true,
            "team_is_done" => $team_is_done,
            "team_is_not_done" => $team_is_not_done
        ));
    }
}

?>