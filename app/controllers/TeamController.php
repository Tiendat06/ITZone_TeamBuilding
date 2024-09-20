<?php

class TeamController{
    private TeamArrivalService $teamArrivalService;
    private TeamPuzzleService $teamPuzzleService;
    private LocationService $locationService;
    private HintService $hintService;
    private PersonService $personService;
    private SiteService $siteService;

    public function __construct()
    {
        $this->teamArrivalService = new TeamArrivalService();
        $this->teamPuzzleService = new TeamPuzzleService();
        $this->locationService = new LocationService();
        $this->hintService = new HintService();
        $this->personService = new PersonService();
        $this->siteService = new SiteService();
    }

//    [POST, FETCH] /team/get_topic_hint
    public function get_topic_hint($topic_id, $hint_priority){
        if($this->hintService->updateHintByTopicIdAndPriority($topic_id, $hint_priority)){
            echo json_encode(array(
               'status' => true,
               'message' => 'Update hint successfully'
            ));
        } else {
            echo json_encode(array(
               'status' => false,
               'message' => 'Update hint failed'
            ));
        }
    }

//    [POST, FETCH] /team/update_topic_is_done
    public function update_topic_is_done($topic_id, $is_done)
    {
        $data = $this->teamPuzzleService->updateTeamIsDoneByTopicIdAndTeamId($topic_id, $is_done);
        if($data['is_done_mentor']){
            echo json_encode(array(
                'status' => true,
                'message' => 'Update Successfully',
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Update Failed',
            ));
        }
        return;
    }

//    [POST, FETCH] /team/update_time_fine
    public function update_time_fine($topic_id){
        $data = $this->teamPuzzleService->updateTimeFineByTopicIdAndTeamId($topic_id);
        if($data['isUpdateSuccess']){
            echo json_encode(array(
                'status' => true,
                'message' => 'Update Successfully',
                'time_fine' => $data['time_fine']
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Update Failed'
            ));
        }
    }

//    [POST, FETCH] /team/check_time_fine
    public function check_time_fine($topic_id){
        $data = $this->teamPuzzleService->getTeamPuzzlesByTeamIdAndTopicId($topic_id);
        echo json_encode(array(
           'status' => true,
           'time_fine' =>  $data['time_fine']
        ));
    }

//    [POST, FETCH] /team/check_is_done_topic
    public function check_is_done_topic($topic_id){
        if ($this->teamPuzzleService->checkTeamIsDoneByTopicIdAndTeamId($topic_id)){
            echo json_encode(array(
                'status' => true,
                'message' => 'Complete'
            ));
        } else{
            echo json_encode(array(
                'status' => false,
                'message' => 'Incomplete'
            ));
        }
    }

//    [POST, FETCH] /team/update_lotte_location
    public function update_lotte_location($location_id){
        $updateLotteIsDone = $this->teamPuzzleService->updateLotteIsDoneByTeamId();
        if($this->teamArrivalService->updateIsShowNextLocationByLocationIdAndTeamId($location_id)){
            echo json_encode(array(
                'status' => true,
                'message' => 'Update Lotte Successfully',
                'is_lotte_done' => $updateLotteIsDone
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Update Lotte Failed',
                'is_lotte_done' => $updateLotteIsDone
            ));
        }
    }

//    [POST, FETCH] /team/view_topic_hint
    public function view_topic_hint($topic_id, $hint_priority){
        $hint = $this->hintService->getHintByTopicIdAndPriority($topic_id, $hint_priority);
        $hint_description = mb_convert_encoding($hint->getHintDescription(), 'UTF-8', 'auto');
        if($hint){
            echo json_encode(array(
                'status' => true,
                'hint_description' => $hint_description,
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Hint not found',
            ));
        }

    }

//    [GET] /team/game-1
    public function game_1(){
        $team_arrival_location = $this->teamArrivalService->getTeamArrivalsAndLocationByTeamId();
        $content = 'team-game-1';
        $footer = 'game';
        include "./views/layout/index.php";
    }

//    [GET] /team/game-1-topic/{param}
    public function game_1_topic($location_id){
        $topic_data = $this->locationService->index($location_id);
        $location_data = $this->locationService->getLocationByLocationId($location_id);

//        $team_arrival_data = $this->teamArrivalService->getTeamArrivalByLocationIdAndTeamId($location_id);
//        $next_team_arrival_id = $this->siteService->getNextOrPreviousId($team_arrival_data->getTeamArrivalId());
//        $next_team_arrival_data = $this->teamArrivalService->getTeamArrivalByTeamArrivalId($next_team_arrival_id);
//        $next_location_id = $next_team_arrival_data->getLocationId();
//        $next_location_data = $this->locationService->getLocationByLocationId($next_location_id);
        $content = 'team-game-1-topic';
        $footer = 'game';
        include "./views/layout/index.php";
    }

//    [GET] /team/game-mentor
    public function game_mentor()
    {
        $location_id = $this->teamArrivalService->getMentorLocationByTeamId();
        $content = 'team-game-mentor';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /team/mentor-topic/{param}
    public function mentor_topic($location_id)
    {
        $topic_data = $this->locationService->index($location_id);
        $content = 'team-mentor-topic';
        $footer = 'home';
        include "./views/layout/index.php";
    }

//    [GET] /team/member
    public function team_member()
    {
        $mentor = $this->personService->getMentorWhileTeamIsDoneMentorGameByTeamId();
        $mentor_name = $mentor->getPersonName();
        $mentor_phone = $mentor->getPersonPhone();
        $mentor_key = $mentor->getMentorKey();

        $team_member = $this->personService->getTeamMemberByTeamId();
        $content = 'team-member';
        $footer = 'team';
        include "./views/layout/index.php";
    }

//    [GET] /team/rule
    public function team_rule(){
        $content = 'team-rule';
        $footer = 'rule';
        include "./views/layout/index.php";
    }
}

?>