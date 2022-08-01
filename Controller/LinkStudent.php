<?php
    class StudentController{
        public function CallStudentFuncs(){
            include "../Frontend/StudentProfile.php";
        }
    }
    $st=new StudentController();
    $st->CallStudentFuncs();
?>