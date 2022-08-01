<?php
    session_start();
    include "../Backend/Student.php";
    //Function reads courseid, and returns course name when found
    function readCID($CID){
        $filename='../Invoices/Courses.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($Arrline[0]==$CID){
                return $Arrline[1];
                fclose($file);
            }
        }
        fclose($file);
    }
    function readTchSch($TchID,Student $st){
        $filename='../Invoices/TeacherSchedule.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($TchID==$Arrline[0]){
                $st->SetSchedule($Arrline[1],$Arrline[2]);
                $st->ShowSCH();
            }
        }
    }
    function readTchCrs($CID,Student $st){
        $filename='../Invoices/TchToCrsRelation.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($CID==$Arrline[1]){
                $CID;
                readTchSch($Arrline[0],$st);
            }
        }
    }
    function readBus($BID,Student $st){
        $BID=trim($BID);
        $filename='../Invoices/Bus.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($BID==$Arrline[0]){
                $st->SetBus($Arrline[0],$Arrline[1],$Arrline[2]);
            }
        }
    }
    function StFees($cid){
        $filename='../Invoices/CourseFees.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $stfee=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($cid==$Arrline[0]){
                if(empty($Arrline[1])){
                    break;
                }
                $x=intval($Arrline[1]);
                $stfee=$x;
            }
        }
        fclose($file);
        return $stfee;
    }
    function StToCrs(Student $st,$func){
        $filename='../Invoices/StToCrsRelation.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $incr=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($func==1){
                if($st->getID()==$Arrline[0]){
                    $CID=$Arrline[1];
                    $st->SetCourse($CID[1],readCID($CID[1]));
                    $st->ShowCRS();
                }
                
            }
            if($func==2){
                if($st->getID()==$Arrline[0]){
                    $incr+=StFees($Arrline[1]);
                    $st->SetStFee($incr);
                }
            }
        }
        fclose($file);
    }
    function Grades(Student $st){
        $filename='../Invoices/StGrd.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($st->getID()==$Arrline[0]){
                $CID=$Arrline[1];
                $st->SetGrade($Arrline[2]);
                $st->SetCourse($Arrline[1],readCID($CID[1]));
                $st->ShowCRS();
                $st->ShowGRD();
            }
        }
        fclose($file);
    }
    function Schedule(Student $st){
        $filename='../Invoices/StToCrsRelation.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($st->getID()==$Arrline[0]){
                $CID=$Arrline[1];
                $st->SetCourse($CID,readCID($CID[1]));
                $st->ShowCRS();
                readTchCrs($CID,$st);
                echo "<br>";
            }
        }
        fclose($file);
    }
    function Bus(Student $st){
        $filename='../Invoices/BusToStudent.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($st->getID()==$Arrline[0]){
                readBus($Arrline[1],$st);
                $st->ShowBus();
            }
        }
        fclose($file);
    }
    function Courses(Student $st){
        $filename='../Invoices/Courses.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            $st->SetCourse($Arrline[0],$Arrline[1]);
            $st->ShowCRS();
        }
        fclose($file);
    }
    function LookForChosenCourse($cid){
        $filename='../Invoices/Courses.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($cid==$Arrline[0]){
                fclose($file);
                return true;
            }
        }
        fclose($file);
    }
    function ExistentCourse($filename,$cid,$stid){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($stid==$Arrline[0] && $cid==$Arrline[1]){
                fclose($file);
                return true;
            }
        }
        fclose($file);
    }
    function EnrollInCourse($cid,$stid){
        if(LookForChosenCourse($cid)==true){
            $filename='../Invoices/StToCrsRelation.txt';
            if(ExistentCourse($filename,$cid,$stid)!=true){
                $file=fopen($filename, 'a+') or die ('File Inaccesible');
                fwrite($file,$stid."|".$cid."|"."\n");
                fclose($file);
            }
        }
    }
    //Recieve ID from login page, searches for it in student file, then creates an object of the student
    $id_value = $_SESSION['ID'];
    $filename='../Invoices/Student.txt';
    $file=fopen($filename, 'a+') or die ('File Inaccesible');
    $seperator="|";
    while(!feof($file)){
        $line=fgets($file);
        $Arrline=explode($seperator,$line);
        if($Arrline[0]==$id_value){
            $st=new Student($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4],$Arrline[5],$Arrline[6],$Arrline[7]);
        }
    }
    fclose($file);
?>