<?php

class Location{
    private string $location_id;
    private string $location_name;
    private string $location_img;
    private string $location_address;
    private string $bus_go;
    private string $bus_back;
    private string $location_map;
    private string $member_id;

    public function __construct($location_id, $location_name, $location_img, $location_address, $bus_go, $bus_back, $location_map, $member_id){
        $this->location_id = $location_id;
        $this->location_name = $location_name;
        $this->location_img = $location_img;
        $this->location_address = $location_address;
        $this->bus_go = $bus_go;
        $this->bus_back = $bus_back;
        $this->location_map = $location_map;
        $this->member_id = $member_id;
    }

    public function getLocationId(){
        return $this->location_id;
    }

    public function getLocationName(){
        return $this->location_name;
    }

    public function getLocationImg(){
        return $this->location_img;
    }

    public function getLocationAddress(){
        return $this->location_address;
    }

    public function getBusGo(){
        return $this->bus_go;
    }

    public function getBusBack(){
        return $this->bus_back;
    }

    public function getLocationMap(){
        return $this->location_map;
    }

    public function getMemberId(){
        return $this->member_id;
    }

    public function setLocationId($location_id){
        $this->location_id = $location_id;
    }

    public function setLocationName($location_name){
        $this->location_name = $location_name;
    }

    public function setLocationImg($location_img){
        $this->location_img = $location_img;
    }

    public function setLocationAddress($location_address){
        $this->location_address = $location_address;
    }

    public function setBusGo($bus_go){
        $this->bus_go = $bus_go;
    }

    public function setBusBack($bus_back){
        $this->bus_back = $bus_back;
    }

    public function setLocationMap($location_map){
        $this->location_map = $location_map;
    }

    public function setMemberId($member_id){
        $this->member_id = $member_id;
    }
}

?>