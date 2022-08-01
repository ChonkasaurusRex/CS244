<?php include "../FileHandling/CRUDTeacher.php"; include "../Frontend/TeacherSideMenu.html"; ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Courses</h1>
            <?php Courses($tch) ?>
        </div>
    </div>
</html>