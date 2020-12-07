<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "todo";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (isset($_POST['add'])) {
        $work =  mysqli_escape_string($conn,$_POST['work']);
        $sql = "INSERT INTO task (task_name) VALUES ('{$work}')";
        mysqli_query($conn,$sql) or die();
        header('Location: http://localhost/devnazmul.com/To-Do%20App/index.php');
    }
?>