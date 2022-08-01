<?php include "../FileHandling/CRUDAccountant.php"; include "../Frontend/AccountantSideMenu.html";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        addSalary($_POST['sal'],$_POST['id']);
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
            <h1>Add Salary</h1>
            <form method="post">
                ID: <input type="text" name="id"><br><br>
                Salary: <input type="text" name="sal"><br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>