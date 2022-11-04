<?php

function get_assignments($courseID){
    global $db;
    if($courseID){
        $query  = 'SELECT A.ID, A.Description, C.coursename FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID WHERE A.courseID = :courseID ORDER BY A.ID';
    }else{
        $query  = 'SELECT A.ID, A.Description, C.coursename FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID ORDER BY C.courseID';
    }

    $statement = $db

}