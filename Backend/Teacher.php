<?php
	session_start();
	include "../Frontend/TopNav.html";
	require "User.php";
	require "UserInfo.php";
	require "Courses.php";
    require "CourseInterface.php";
	require "Schedule.php";
	require "Fees.php";
	require "ShowSal.php";
	class Teacher extends UserInfo implements User , CourseInterface , ShowSal{
	    private $phone;
	    private $address;
	    use Courses{
			Courses::__construct as crs;
		}
		use Schedule{
			Schedule::__construct as sch;
		}
		use Fees;
		public function setcrs($id,$name)
		{
			$this->crs($id,$name);

		}
		public function __construct($ID, $fn, $ln, $em, $pass, $ph, $add)
	    {
			parent::__construct($ID, $fn, $ln, $em, $pass);
	        $this->phone=$ph;
	        $this->address=$add;
	    }
		public function SetCourse($CID,$CN)
        {
            $this->crs($CID,$CN);
        }
		public function SetSchedule($STT,$ET){
			$this->sch($STT,$ET);
		}
        public function getph(){
        	return $this->phone;
        }
        public function getadd(){
            return $this->address;
        }
		function __destruct(){
		}
	    public function ShowProfile()
	    {
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
		public function ShowCRS()
		{
			echo "<h3>Course ID</h3>";
			echo $this->getCID();
			echo"<hr>";
			echo "<h3>Course Name</h3>";
			echo $this->getCN();
			echo "<hr>";
		}
		public function ShowSCH()
		{
			echo "<h3>Start Time</h3>";
			echo $this->getSTT();
			echo"<hr>";
			echo "<h3>End Time</h3>";
			echo $this->getET();
			echo "<hr>";
		}
		public function ShowSal(){
			echo $this->getTeacherSalary();
			echo "<hr>";
		}
	}
?>
