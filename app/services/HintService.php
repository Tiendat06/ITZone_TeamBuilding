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
}

?>