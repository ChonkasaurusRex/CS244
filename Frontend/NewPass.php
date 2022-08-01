<?php session_start() ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="nav.css">
<link rel="stylesheet" type="text/css" href="lgin.css">
<html>
    <div id="nav-placeholder"></div>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
    $.get("nav.html", function(data){
        $("#nav-placeholder").replaceWith(data);
    });
    function myFunction() {
        var x = document.getElementById("inp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
    <?php
        $Emailcheck=$_SESSION['email'];
        $file="../Invoices/Student.txt";
        $id="";
        $fname="";
        $lname="";
        $filetype=fopen($file,'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($filetype)){
            $line=fgets($filetype);
            $Arrline=explode($seperator,$line);
            if($Arrline[3]==$Emailcheck){
                $id=$Arrline[0];
                $fname=$Arrline[1];
                $lname=$Arrline[2];
           }
        }
        fclose($filetype);
        $file="../Invoices/Student.txt";
        $ct=-1;
        $linearr=[];
        $filetype=fopen($file,'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($filetype)){
            $line=fgets($filetype);
            $Arrline=explode($seperator,$line);
            ++$ct;
            if($Arrline[3]==$Emailcheck && $Arrline[7]!=""){
                echo "<br>";
                $pass=$Arrline[4];
                $liner=str_replace($pass,$id.$fname.$lname,$line);
                $crl = file( $file, FILE_IGNORE_NEW_LINES );
                $crl[$ct] = $liner;
                file_put_contents($file, implode("\n", $crl));
                fclose($filetype);
                break;
           }
        }
    ?>
    <body>
        <hr id="navsep"></hr>
        <div class="lgn">
            <h1 id="ln">New Password</h1>
            <hr class="lnsep"></hr>
            <div class="form">
                <p class="info">Please Enter New Password</p>
                Old Password: <input id="inp" type="password" name="pass"><br><br>
                New Password: <input id="inp" type="password" name="pass"><br><br>
                Confirm Password: <input id="inp" type="password" name="pass"><br><br>
                <input type="checkbox" onclick="myFunction()">Show Password<br><br>
                <label for="login">Type:</label>
                <select name="login" id="login">
                    <option value="Admin">Admin</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Accountant">Accountant</option>
                </select> <br><br>
                <input type="submit" name="submit" value="Confirm" class="lnbutton"><br><br>
                </form>
            </div>
        </div>
    </body>
</html>