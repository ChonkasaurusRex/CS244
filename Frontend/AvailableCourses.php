<?php include "../FileHandling/CRUDStudent.php"; include "../Frontend/StudentSideMenu.html";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        EnrollInCourse($_POST['cid'],$st->getID());
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css?v=1.1">
<html>
    <div id="mn">
    <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1> Available Courses</h1>
            <?php Courses($st); ?>
            <h1>Enroll in Course</h1>
            <form method="post">
                Enter CourseID: <input type="text" name="cid" id="cid">
                <br><br>
                <input type="submit" name="enroll" value="Enroll"><br><br>
            </form>
        </div>
    </div>
</html>