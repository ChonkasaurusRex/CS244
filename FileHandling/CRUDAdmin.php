<?php
    require "../Backend/Admin.php";
    function AutomateID($filename,$DefualtID){
        $str=$DefualtID."|";
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        fwrite($file, $str);
        fclose($file);
    }
    function ReadPrevID($filename){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $incrid=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(empty($line)){
                break;
            }
            $incrid=intval($Arrline[0]);
        }
        fclose($file);
        return $incrid+1;
    }
    function CheckIfExistent($filename,$credentials){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            $arrcred=explode($seperator,$credentials);
            if(strcasecmp($arrcred[1],$Arrline[1]) && strcasecmp($arrcred[2],$Arrline[2])){
                return true;
            }
        }
        fclose($file);
    }
    function AddUser($filename,$credentials){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        if(CheckIfExistent($filename,$credentials)!=true){
            AutomateID($filename,ReadPrevID($filename));
            fwrite($file,$credentials."\n");
            fclose($file);
        }
        else{
            fclose($file);
            return false;
        }
    }
    function CheckLastLine($filename,$id){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $max=-9999999;
        while(!feof($file,)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(intval($Arrline[0])>$max && !empty($Arrline[0])){
                $max=intval($Arrline[0]);
            }
        }
        fclose($file);
        if($max==$id){
            return true;
        }
    }
    function UpdateUser($filename,$old,$new,$id){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $ct=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($id==$Arrline[0]){
                $liner=str_replace($old,$new,$line);
                $crl = file( $filename, FILE_IGNORE_NEW_LINES );
                $crl[$ct] = $liner;
                file_put_contents($filename, implode("\n", $crl));
                if(CheckLastLine($filename,$id)!=true){
                    file_put_contents($filename, implode("", $crl));
                }
                break;
            }
            $ct++;
        }
        fwrite($file,"\n");
        fclose($file);
    }
    function DeleteUser($filename,$id){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $ct=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($id==$Arrline[0]){
                $crl = file( $filename );
                $crl[$ct] = "";
                file_put_contents($filename,$crl);
                break;
            }
            $ct++;
        }
        fclose($file);
    }
    $id_value = $_SESSION['ID'];
    $filename='../Invoices/Admin.txt';
    $file=fopen($filename, 'a+') or die ('File Inaccesible');
    $seperator="|";
    while(!feof($file)){
        $line=fgets($file);
        $Arrline=explode($seperator,$line);
        if($Arrline[0]==$id_value){
            $ad=new Admin($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4]);
        }
    }
    fclose($file);
?>