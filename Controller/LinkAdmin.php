<?php
    class AdminController{
        public function CallAdminFuncs(){
            include "../Frontend/AdminProfile.php";
        }
    }
    $ad=new AdminController();
    $ad->CallAdminFuncs();
?>