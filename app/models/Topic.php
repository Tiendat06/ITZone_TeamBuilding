<?php

class Topic{
    private string $topic_id;
    private string $topic_link;
    private string $topic_answer;
    private string $topic_img;
    private string $location_id;

    public function __construct($topic_id, $topic_link, $topic_answer, $topic_img, $location_id){
        $this->topic_id = $topic_id;
        $this->topic_link = $topic_link;
        $this->topic_answer = $topic_answer;
        $this->topic_img = $topic_img;
        $this->location_id = $location_id;
    }

    public function getTopicId(){
        return $this->topic_id;
    }

    public function getTopicLink(){
        return $this->topic_link;
    }

    public function getTopicAnswer(){
        return $this->topic_answer;
    }

    public function getTopicImg(){
        return $this->topic_img;
    }

    public function getLocationId(){
        return $this->location_id;
    }

    public function setTopicId($topic_id){
        $this->topic_id = $topic_id;
    }

    public function setTopicLink($topic_link){
        $this->topic_link = $topic_link;
    }

    public function setTopicAnswer($topic_answer){
        $this->topic_answer = $topic_answer;
    }

    public function setTopicImg($topic_img){
        $this->topic_img = $topic_img;
    }

    public function setLocationId($location_id){
        $this->location_id = $location_id;
    }
}

?>