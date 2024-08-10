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
    } // support
    else if($content == 'support'){
        include "./views/support/support.php";
    } else if($content == 'support-question'){
        include "./views/support/question.php";
    }
    // no route
    else if($content == 'rule'){
        include "./views/site/rule.php";
    } else if($content == 'mentor'){
        include "./views/mentor/mentor.php";
    } else if($content == 'team-member'){
        include "./views/team/member.php";
    }

?>