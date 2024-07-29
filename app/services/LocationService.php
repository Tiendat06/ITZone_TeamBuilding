<?php

class LocationService{
    private LocationRepository $locationRepository;
    public function __construct()
    {
        $this->locationRepository = new LocationRepository();
    }

    public function getLocations(){
        return $this->locationRepository->getLocations();
    }
}

?>