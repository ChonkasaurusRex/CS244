<?php
trait Semester 
{
    private $number;
    private $courses;
    private $student;
    private $teacher;

    public function __construct($num, $co , $st, $te)
    {
        $this->number = $num;
        $this->courses = $co;
        $this->student = $st;
        $this->teacher = $te;
    }
    public function getnum()
    {
        return $this->number;
    }
    public function getco()
    {
        return $this->courses;
    }
    public function getst()
    {
        return $this->student;
    }
    public function gette()
    {
        return $this->teacher;
    }
    function __destruct()
    {

    }
}
?>+