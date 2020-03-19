<?php
    include 'connection.php';
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO `register` (`name`, `mail`, `uname`, `password`) VALUES ('$name', '$mail', '$uname', '$password')";

    if(mysqli_query($connection, $query))
    {
        echo '
        
        <script>
        alert("Record has been successfully inserted.\nNow you can here login");
        window.location.href = "login.html";
        </script>

        ';
    }
    else{
        echo "error" . mysqli_error($connection);
    }

    //close the connection
    mysqli_close($connection);
?>