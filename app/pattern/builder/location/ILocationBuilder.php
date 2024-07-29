<?php

interface ILocationBuilder{
    public function setLocationId($location_id): ILocationBuilder;
    public function setLocationName($location_name): ILocationBuilder;
    public function setLocationImg($location_img): ILocationBuilder;
    public function setLocationAddress($location_address): ILocationBuilder;
    public function setBusGo($bus_go): ILocationBuilder;
    public function setBusBack($bus_back): ILocationBuilder;
    public function setMemberId($member_id): ILocationBuilder;
    public function build(): Location;
}

?>