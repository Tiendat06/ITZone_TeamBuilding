<?php

class Role{
    private string $role_id;
    private string $role_name;

    public function __construct($role_id, $role_name){
        $this->role_id = $role_id;
        $this->role_name = $role_name;
    }

    public function getRoleId(){
        return $this->role_id;
    }

    public function getRoleName(){
        return $this->role_name;
    }

    public function setRoleId($role_id){
        $this->role_id = $role_id;
    }

    public function setRoleName($role_name){
        $this->role_name = $role_name;
    }
}

?>