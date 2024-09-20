<?php

class TopicService{
    private TopicRepository $topicRepository;
    public function __construct()
    {
        $this->topicRepository = new TopicRepository();
    }

}

?>