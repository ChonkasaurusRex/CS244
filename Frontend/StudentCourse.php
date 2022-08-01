<?php include "../FileHandling/CRUDStudent.php"; include "../Frontend/StudentSideMenu.html"; ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css?v=1.1">
<html>
    <div id="mn">
    <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1> Enrolled Courses</h1>
            <?php 
            $func=1;
            StToCrs($st,$func);
            $func=2;
            StToCrs($st,$func);
            ?>
            <a href="http://localhost/CS244/Frontend/AvailableCourses.php"><button class="enroll">Enroll In Course</button><br></a>
        </div>
    </div>
</html>