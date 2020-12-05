<?php

$development = false;
$zeke = true;
// add rules here and below to make it work on ~epeterson...

if ($development == false){
    if ($zeke) {
        $directory_path =  "/~ezekielp/databases_class/dbFinalProject2020/";
    }
    else{
        $directory_path = "/~cwycoff/databases_class/dbFinalProject2020/";
    }
}
else{
    $directory_path = "";
}
?>