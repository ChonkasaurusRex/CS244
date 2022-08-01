<?php
    include "../FileHandling/CRUDAdmin.php";
    include "../Frontend/AdminSideMenu.html";
    function ControllerUpdateUser(){
        $intype=filter_input(INPUT_POST, 'upuser', FILTER_UNSAFE_RAW);
        if($intype=='Admin'){
            UpdateUser("../Invoices/Admin.txt",$_POST['old'],$_POST['new'],$_POST['id']);
        }
        elseif($intype=='Student'){
            UpdateUser("../Invoices/Student.txt",$_POST['old'],$_POST['new'],$_POST['id']);
        }
        elseif($intype=='Teacher'){
            UpdateUser("../Invoices/Teacher.txt",$_POST['old'],$_POST['new'],$_POST['id']);
        }
        elseif($intype=='Accountant'){
            UpdateUser("../Invoices/Accountant.txt",$_POST['old'],$_POST['new'],$_POST['id']);
        }
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
            <h1>Update Existing User</h1>
            <form method="post" action="<?php ControllerUpdateUser(); ?>">
                ID: <input type="text" name="id">
                <br><br>
                Info To Be Replaced: <input type="text" name="old">
                <br><br>
                New Info: <input type="text" name="new">
                <br><br>
                    <label for="upuser">Type:</label>
                    <select name="upuser" id="upuser">
                        <option value="Admin">Admin</option>
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Accountant">Accountant</option>
                    </select> <br><br>
                <input type="submit" name="submit" value="Update"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>