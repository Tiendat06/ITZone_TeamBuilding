<?php

class HintService{
    private HintRepository $hintRepository;
    public function __construct()
    {
        $this->hintRepository = new HintRepository();
    }

    public function getHintsWithIsShow($topic_id): array{
        return $this->hintRepository->getHintsWithIsShow($topic_id);
    }

    public function updateHintByTopicIdAndPriority($topic_id, $hint_priority): bool{
        return $this->hintRepository->updateHintByTopicIdAndPriority($topic_id, $hint_priority);
    }

    public function getHintByTopicIdAndPriority($topic_id, $hint_priority): Hint{
        return $this->hintRepository->getHintByTopicIdAndPriority($topic_id, $hint_priority);
    }
}

?>