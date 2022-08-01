<?php
    session_start();
    include "../Frontend/TopNav.html";
    require_once "User.php";
    require "UserInfo.php";
    require "Fees.php";
    require "ShowSal.php";
    class Accountant extends UserInfo implements User, ShowSal{
        use Fees;
        public function __construct($ID, $fn, $ln, $em, $pass)
        {
            parent::__construct($ID, $fn, $ln, $em, $pass);
        }
        public function ShowProfile(){
            echo "<h3>ID</h3>";
            echo $this->getID();
            echo "<hr>";
            echo "<h3>First Name</h3>";
            echo $this->getfName();
            echo "<hr>";
            echo "<h3>Last Name</h3>";
            echo $this->getlName();
            echo "<hr>";
            echo "<h3>Email</h3>";
            echo $this->getem();
            echo "<hr>";
        }
        public function ShowSal(){
            echo $this->getAccountantSalary();
            echo "<hr>";
        }
        public function ShowSemFee(){
            echo $this->getSemesterFee();
            echo "<hr>";
        }
    }
?>