<?php 
    include "../FileHandling/CRUDAdmin.php";
    include "../Frontend/AdminSideMenu.html";
    //Add User
    function ControllerAddUser(){
        $intype=filter_input(INPUT_POST, 'adduser', FILTER_UNSAFE_RAW);
        $cred="";
        $s="|";
        if($intype=='Admin'){
            $cred=$_POST['fn'].$s.$_POST['ln'].$s.$_POST['em'].$s.$_POST['pass'].$s;
            AddUser("../Invoices/Admin.txt",$cred);
        }
        elseif($intype=='Student'){
            $cred=$_POST['fn'].$s.$_POST['ln'].$s.$_POST['em'].$s.$_POST['pass'].$s.$_POST['ph'].$s.$_POST['add'].$s;
            AddUser("../Invoices/Student.txt",$cred);
        }
        elseif($intype=='Teacher'){
            $cred=$_POST['fn'].$s.$_POST['ln'].$s.$_POST['em'].$s.$_POST['pass'].$s.$_POST['ph'].$s.$_POST['add'].$s;
            AddUser("../Invoices/Teacher.txt",$cred);
        }
        elseif($intype=='Accountant'){
            $cred=$_POST['fn'].$s.$_POST['ln'].$s.$_POST['em'].$s.$_POST['pass'].$s;
            AddUser("../Invoices/Accountant.txt",$cred);
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
            <h1>Add New User</h1>
            <form method="post" action="<?php ControllerAddUser(); ?>">
                First Name: <input type="text" name="fn">
                <br><br>
                Last Name: <input type="text" name="ln">
                <br><br>
                E-mail: <input type="text" name="em">
                <br><br>
                Password: <input type="text" name="pass">
                <br><br>
                Phone: <input type="text" name="ph">
                <br><br>
                Address: <input type="text" name="add">
                <br><br>
                    <label for="adduser">Type:</label>
                    <select name="adduser" id="adduser">
                        <option value="Admin">Admin</option>
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Accountant">Accountant</option>
                    </select> <br><br>
                <input type="submit" name="submit" value="Add"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>