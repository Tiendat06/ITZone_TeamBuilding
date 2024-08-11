<?php
    /**
     * @var $content
     */
    if($content == 'home'){
        include "./views/site/home.php";
    } else if($content == 'location'){
        include "./views/location/location.php";
    } // guard
    else if($content == 'guard'){
        include "./views/guard/guard.php";
    } else if($content == 'guard-question'){
        include "./views/guard/question.php";
    } // team
    else if($content == 'team-game-1'){
        include "./views/team/team_game_1.php";
    } else if($content == 'team-game-1-topic'){
        include "./views/team/game_1_topic.php";
    } else if($content == 'team-game-mentor'){
        include "./views/team/game_mentor.php";
    }
    else if($content == 'team-mentor-topic'){
        include "./views/mentor/mentor_topic.php";
    } else if($content == 'team-member'){
        include "./views/team/team_member.php";
    }
    // support
    else if($content == 'support'){
        include "./views/support/support.php";
    } else if($content == 'support-question'){
        include "./views/support/question.php";
    } else if($content == 'support-team'){
        include "./views/support/team_control.php";
    }
    // mentor
    else if($content == 'mentor'){
        include "./views/mentor/mentor.php";
    } else if($content == 'mentor-member'){
        include "./views/mentor/mentor_member.php";
    }
    // no route
    else if($content == 'rule'){
        include "./views/site/rule.php";
    }

?>