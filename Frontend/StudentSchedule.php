<?php include "../FileHandling/CRUDStudent.php"; include "../Frontend/StudentSideMenu.html"; ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
    <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Schedule</h1>
            <?php Schedule($st); ?>
        </div>
    </div>
</html>