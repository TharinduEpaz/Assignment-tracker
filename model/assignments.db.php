<?php

function get_assignments($courseID){
    global $db;
    if($courseID){
        $query  = 'SELECT A.ID, A.Description, C.coursename FROM assignments A LEFT JOIN courses C ON A.CourseID = C.courseID WHERE A.courseID = :courseID ORDER BY A.ID';
    }else{
        $query  = 'SELECT A.ID, A.Description, C.coursename FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID ORDER BY C.courseID';
    }

    $statement = $db->prepare($query);
    
    // Binds a value to a corresponding named or question mark placeholder in the SQL statement that was used to prepare the statement.
    // value -> The value to bind to the parameter

    $statement->bindValue(':courseID',$courseID);
    $statement->execute();
    $assignments = $statement->fetchAll();

    // PDOStatement::closeCursor() frees up the connection to the server so that other SQL statements may be issued, but leaves the statement in a state that enables it to be executed again.
    
    $statement->closeCursor();
    return $assignments;
}

function delete_assignment($assignID){
    global $db;

    $query = 'DELETE FROM assignments WHERE ID = :assignID';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':assignID',$assignID);
    $statement->execute();
    $statement->closeCursor();
}

function add_assignment($courseID,$description){
    global $db;

    $query = 'INSERT INTO assignments (Description,CourseID VALUES(:description,:courseID)';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':description',':courseID',$description,$courseID);
    $statement->execute();
    $statement->closeCursor();
}