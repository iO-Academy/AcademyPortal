<?php


namespace Portal\Controllers;


class GetEventsInfoController
{
    private $eventsModel;

    public function __construct($eventsModel)
    {
        $this->eventsModel = $eventsModel;
    }

}