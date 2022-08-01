<?php include "../FileHandling/CRUDTeacher.php"; include "../Frontend/TeacherSideMenu.html";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        Grades($tch,$_POST['id'],$_POST['grade']);
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <body>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <br>
            <h1>Submit Student Grade</h1>
            <form method="post">
                ID: <input type="text" name="id"><br><br>
                Grade: <input type="text" name="grade">
                <br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>