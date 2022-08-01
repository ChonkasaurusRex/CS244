<?php
    class TeacherController{
        public function CallTeacherFuncs(){
            include "../Frontend/TeacherProfile.php";
        }
    }
    $tch=new TeacherController();
    $tch->CallTeacherFuncs();
?>