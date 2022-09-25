<?php
    $m=$_POST["marks"];
    $id=$_POST["ass_id"];

    if(empty($m)){
        echo "Enter Marks";
    }else{
        require "database.php";

        Dbms::s("UPDATE `assignment_marks` SET `marks`='".$m."' WHERE `a_mark_id`='".$id."' ;");
    }



?>