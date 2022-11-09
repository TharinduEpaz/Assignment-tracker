<?php

function getcourses(){
    // The global keyword is used to manipulate variable scope
    global $db;
    $query = 'SELECT * FROM courses ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;

}

function get_course_name($courseID){
    if(!$courseID){
        return "all courses";
    }
    global $db;
    $query = 'SELECT * FROM courses WHERE courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(":courseID",$courseID);
    $statement->execute();
    $course= $statement->fetch();
    $statement->closeCursor();
    $course_name = $course['courseName'];

    return $course_name;
    

}

function delete_course($courseID){
    global $db;
    $query = 'DELETE FROM courses WHERE courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(":courseID",$courseID);
    $statement->execute();
    $statement->closeCursor();
}

function add_course($course_name){
    global $db;
    $query = 'INSERT INTO courses (courseName) VALUES (:courseName)';
    $statement = $db->prepare($query);
    $statement->bindValue(":courseName",$course_name);
    $statement->execute();
    $statement->closeCursor();
}