<?php

class AccountService{
    private AccountRepository $accountRepository;
    public function __construct(){
        $this->accountRepository = new AccountRepository();
    }

    public function checkLogin($account_username, $account_password): bool{
        return $this->accountRepository->checkAccountByUsernameAndPassword($account_username,$account_password);
    }

    public function getRoleByUsernameAndPassword($account_username, $account_password): string{
        return $this->accountRepository->getRoleByUsernameAndPassword($account_username, $account_password);
    }
}

?>