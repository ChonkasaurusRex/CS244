<?php
    class AccountantController{
        public function CallAccountantFuncs(){
            include "../Frontend/AccountantProfile.php";
        }
    }
    $acc=new AccountantController();
    $acc->CallAccountantFuncs();
?>