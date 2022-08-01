<?php
    session_start();
    include "../Frontend/TopNav.html";
    require_once "User.php";
    require "UserInfo.php";
    class Admin extends UserInfo implements User{
        public function ShowProfile(){
            echo "<h3>ID:</h3>";
            echo $this->getID();
            echo "<hr>";
            echo "<h3>First Name:</h3>";
            echo $this->getfName();
            echo "<hr>";
            echo "<h3>Last Name:</h3>";
            echo $this->getlName();
            echo "<hr>";
            echo "<h3>Email:</h3>";
            echo $this->getem();
            echo "<hr>";
        }
    }
?>