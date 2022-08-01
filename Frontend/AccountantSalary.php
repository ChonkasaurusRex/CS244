<?php include "../FileHandling/CRUDAccountant.php"; include "../Frontend/AccountantSideMenu.html"; ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Salary</h1>
            <?php $acc->setAccSal(SetSal($acc->getID()));
            $acc->ShowSal(); ?>
        </div>
    </div>
</html>