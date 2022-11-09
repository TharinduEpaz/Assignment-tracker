<?php

require('model/database.php');
require('model/assignments.db.php');
require('model/coursedb.php');

$assignment_id = filter_input(INPUT_POST, 'assignment_id', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_VALIDATE_INT);
$course_name = filter_input(INPUT_POST, 'course_name', FILTER_VALIDATE_INT);

$course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);

if (!$course_id) {
    $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_VALIDATE_INT);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_VALIDATE_INT);
    if (!$action) {
        $action = 'list_assignments';
    }
}

switch ($action) {
    case 'value':
        # code...
        break;

    default:
        $course_name = get_course_name($course_id);
        $courses = getcourses();
        $assignments = get_assignments($course_id);
        include('/view/assignment_list.php');
        break;
}