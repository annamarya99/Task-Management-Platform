<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['dueDate'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $dueDate = $_POST['dueDate'];
        
        echo "<script>console.log('S AU SALVAT DATE IN VARIABILE');</script>";

 
        $sql = "INSERT INTO tasks (`Title`, `Description`, `Due date`) VALUES ( '$title', '$description', '$dueDate')";
        if ($con->query($sql) === TRUE) {
            echo "<script>console.log('askul a fost adăugat cu succes');</script>";
            header("Location: index.php");
        } else {
            echo "Eroare la adăugarea taskului: " . $con->error;
            echo "<script>console.log('NU fost adăugat cu succes');</script>". $con->error;;
            
        }
    } else {
        echo "Toate câmpurile trebuie completate!";
    }
}


$con->close();
?>
