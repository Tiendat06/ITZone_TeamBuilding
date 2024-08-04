<?php

class LogMiddleWare{
    private LogController $logController;
    public function __construct()
    {
        $this->logController = new LogController();
    }
}

?>