<?php
    include "../Frontend/TopNav.html";
    require_once "User.php";
    require "UserInfo.php";
    require "Courses.php";
    require "CourseInterface.php";
    require "Grades.php";
    require "Schedule.php";
    require "Bus.php";
    require "Fees.php";
    class Student extends UserInfo implements User, CourseInterface{
        private $phone;
        private $address;
        use Courses{
            Courses::__construct as crs;
        }
        use Grades{
            Grades::__construct as grd;
        }
        use Schedule{
            Schedule::__construct as sch;
        }
        use Bus{
            Bus::__construct as bs;
        }
        use Fees;
        public function __construct($ID, $fn, $ln, $em, $pass, $ph, $ad)
        {
            parent::__construct($ID, $fn, $ln, $em, $pass);
            $this->phone=$ph;
            $this->address=$ad;
        }
        public function SetCourse($CID,$CN)
        {
            $this->crs($CID,$CN);
        }
        public function SetGrade($grd)
        {
            $this->grd($grd);
        }
        public function SetSchedule($STT,$ET){
			$this->sch($STT,$ET);
		}
        public function SetBus($bid,$br,$drn)
        {
            $this->bs($bid,$br,$drn);
        }
        public function getadd(){
            return $this->address;
        }
        public function getph(){
            return $this->phone;
        }
        public function __destruct()
        {
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
            echo "<h3>Phone Number</h3>";
            echo $this->getph();
            echo "<hr>";
            echo "<h3>Address</h3>";
            echo $this->getadd();
            echo "<hr>";
        }
        public function ShowCRS(){
            echo "<h3>Course ID</h3>";
            echo $this->getCID();
            echo "<hr>";
            echo "<h3>Course Name</h3>";
            echo $this->getCN();
            echo "<hr>";
        }
        public function ShowGRD(){
            echo "<h3>Grade<h3>";
            echo $this->getGRD();
            echo "<hr>";
        }
        public function ShowSCH(){
            echo "<h3>Start Time</h3>";
			echo $this->getSTT()." am";
			echo"<hr>";
            echo "<h3>End Time</h3>";
			echo $this->getET()." am";
			echo "<hr>";
		}
        public function ShowBus(){
            echo "<h1>Bus</h1>";
            echo "<h3>BusID</h3>";
            echo $this->getBID();
            echo"<hr>";
            echo "<h3>Bus Route</h3>";
            echo $this->getBR();
            echo"<hr>";
            echo "<h3>Driver Name</h3>";
            echo $this->getDRN();
            echo"<hr>";
        }
        public function ShowFee(){
            echo "<h1>Semester Fees</h1>";
            echo $this->getStudentFee();
            echo "<hr>";
        }
    }
?>