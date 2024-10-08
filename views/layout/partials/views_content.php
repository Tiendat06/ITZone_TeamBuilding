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
    } else if($content == 'guard-rule'){
        include "./views/guard/guard_rule.php";
    }
    // team
    else if($content == 'team-game-1'){
        include "./views/team/team_game_1.php";
    } else if($content == 'team-game-1-topic'){
        include "./views/team/game_1_topic.php";
    } else if($content == 'team-game-mentor'){
        include "./views/team/game_mentor.php";
    } else if($content == 'team-mentor-topic'){
        include "./views/team/mentor_topic.php";
    } else if($content == 'team-member'){
        include "./views/team/team_member.php";
    } else if($content == 'team-rule'){
        include "./views/team/team_rule.php";
    }
    // support
    else if($content == 'support'){
        include "./views/support/support.php";
    } else if($content == 'support-question'){
        include "./views/support/question.php";
    } else if($content == 'support-team'){
        include "./views/support/team_control.php";
    } else if($content == 'support-rule'){
        include "./views/support/support_rule.php";
    }
    // mentor
    else if($content == 'mentor'){
        include "./views/mentor/mentor.php";
    } else if($content == 'mentor-rule'){
        include "./views/mentor/mentor_rule.php";
    }
//    else if($content == 'mentor-member'){
//        include "./views/mentor/mentor_member.php";
//    }
    // no route


?>