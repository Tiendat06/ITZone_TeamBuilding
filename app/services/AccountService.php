<?php

class AccountService{
    private AccountRepository $accountRepository;
    private PersonRepository $personRepository;
    public function __construct(){
        $this->accountRepository = new AccountRepository();
        $this->personRepository = new PersonRepository();
    }

    public function checkLogin($account_username, $account_password): bool{
        if($this->accountRepository->checkAccountByUsernameAndPassword($account_username,$account_password)){
            $account = $this->accountRepository->getAccountByUsernameAndPassword($account_username,$account_password);
            $_SESSION['person_id'] = $account->getPersonId();
            $_SESSION['role_name'] = $this->accountRepository->getRoleByUserNameAndPassword($account_username,$account_password);
            $person_name = $this->personRepository->getPersonNameByPersonId($_SESSION['person_id'], $_SESSION['role_name']);
            $_SESSION['person_name'] = $person_name;
            return true;
        }
        return false;
    }

    public function getRoleByUsernameAndPassword($account_username, $account_password): string{
        return $this->accountRepository->getRoleByUsernameAndPassword($account_username, $account_password);
    }
}

?>