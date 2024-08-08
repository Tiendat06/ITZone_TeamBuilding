<?php
    /**
     * @var $content
     */
    if($content == 'home'){
        include "./views/site/home.php";
    } else if($content == 'location'){
        include "./views/location/location.php";
    } else if($content == 'guard'){
        include "./views/guard/guard.php";
    } else if($content == 'guard-question'){
        include "./views/guard/question.php";
    } else if($content == 'team'){
        include "./views/team/team.php";
    } else if($content == 'team-game_1'){
        include "./views/team/game_1.php";
    }
    // no route
    else if($content == 'rule'){
        include "./views/site/rule.php";
    } else if($content == 'mentor'){
        include "./views/mentor/mentor.php";
    } else if($content == 'team-member'){
        include "./views/team/member.php";
    } else if($content == 'support'){
        include "./views/support/support.php";
    }

?>