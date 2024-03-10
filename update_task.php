<?php
include('connect.php');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET `Title`='$title', `Description`='$description', `Due date`='$dueDate', `Status`='$status' WHERE Id=$id";

    if ($con->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Record updated successfully";
    } else {
        $response['success'] = false;
        $response['error'] = "Error updating record: " . $con->error;
    }
}

$con->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
