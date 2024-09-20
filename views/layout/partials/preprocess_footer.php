<?php

    /**
     * @var $footer
     */

    $link_home = '';
    $span_home = 'd-none';
    $link_question = '';
    $span_question = 'd-none';
    $link_game = '';
    $span_game = 'd-none';
    $link_rule = '';
    $span_rule = 'd-none';
    $link_team = '';
    $span_team = 'd-none';
    if($footer == 'home'){
        $link_home = 'itz-bg-normal';
        $span_home = '';
    } else if($footer == 'question'){
        $link_question = 'itz-bg-normal';
        $span_question = '';
    } else if($footer == 'game'){
        $link_game = 'itz-bg-normal';
        $span_game = '';
    } else if($footer == 'rule'){
        $link_rule = 'itz-bg-normal';
        $span_rule = '';
    } else if($footer == 'team'){
        $link_team = 'itz-bg-normal';
        $span_team = '';
    }

?>