<?php 
    include "../FileHandling/CRUDAdmin.php";
    include "../Frontend/AdminSideMenu.html";
    function ControllerDeleteUser(){
        $intype=filter_input(INPUT_POST, 'dluser', FILTER_UNSAFE_RAW);
        if($intype=='Admin'){
            DeleteUser("../Invoices/Admin.txt",$_POST['id']);
        }
        elseif($intype=='Student'){
            DeleteUser("../Invoices/Student.txt",$_POST['id']);
        }
        elseif($intype=='Teacher'){
            DeleteUser("../Invoices/Teacher.txt",$_POST['id']);
        }
        elseif($intype=='Accountant'){
            DeleteUser("../Invoices/Accountant.txt",$_POST['id']);
        }
    };
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <body>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <br>
            Delete Existing User:<br><br>
            <form method="post" action="<?php ControllerDeleteUser(); ?>">
                ID: <input type="text" name="id">
                <br><br>
                    <label for="dluser">Type:</label>
                    <select name="dluser" id="dluser">
                        <option value="Admin">Admin</option>
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Accountant">Accountant</option>
                    </select> <br><br>
                <input type="submit" name="submit" value="Delete"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>