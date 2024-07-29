<?php

class Hint{
    private string $hint_id;
    private string $hint_description;
    private bool $is_show;
    private string $topic_id;

    public function __construct($hint_id, $hint_description, $is_show, $topic_id){
        $this->hint_id = $hint_id;
        $this->hint_description = $hint_description;
        $this->is_show = $is_show;
        $this->topic_id = $topic_id;
    }

    public function getHintId(){
        return $this->hint_id;
    }

    public function getHintDescription(){
        return $this->hint_description;
    }

    public function getIsShow(): int{
        return $this->is_show? 1: 0;
    }

    public function getTopicId(){
        return $this->topic_id;
    }

    public function setHintId($hint_id){
        $this->hint_id = $hint_id;
    }

    public function setHintDescription($hint_description){
        $this->hint_description = $hint_description;
    }

    public function setIsShow($is_show){
        $this->is_show = $is_show;
    }

    public function setTopicId($topic_id){
        $this->topic_id = $topic_id;
    }
}

?>