<?php

class Hint{
    private string $hint_id;
    private string $hint_description;
    private DateTime $hint_end;
    private bool $is_show;
    private int $hint_priority;
    private string $topic_id;

    public function __construct($hint_id, $hint_description, $hint_end, $is_show, $hint_priority, $topic_id){
        $this->hint_id = $hint_id;
        $this->hint_description = $hint_description;
        $this->setHintEnd($hint_end);
        $this->is_show = $is_show;
        $this->hint_priority = $hint_priority;
        $this->topic_id = $topic_id;
    }

    public function getHintId(){
        return $this->hint_id;
    }

    public function getHintDescription(){
        return $this->hint_description;
    }

    public function getHintEnd(){
        return $this->hint_end;
    }

    public function getIsShow(): int{
        return $this->is_show? 1: 0;
    }

    public function getHintPriority(): int{
        return $this->hint_priority;
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

    public function setHintEnd($hint_end){
        if (!$hint_end instanceof DateTime) {
            $hint_end = new DateTime($hint_end);
        }
        $this->hint_end = $hint_end;
    }

    public function setIsShow($is_show){
        $this->is_show = $is_show;
    }

    public function setHintPriority($hint_priority){
        $this->hint_priority = $hint_priority;
    }

    public function setTopicId($topic_id){
        $this->topic_id = $topic_id;
    }
}

?>