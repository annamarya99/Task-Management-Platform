<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['taskIds']) && is_array($data['taskIds'])) {
        foreach ($data['taskIds'] as $taskId) {
            
            $sql = "DELETE FROM tasks WHERE Id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $taskId);
            $stmt->execute();
        }
        echo "Tasks deleted successfully.";
    } else {
        echo "Invalid request.";
    }
}

$con->close();
?>
