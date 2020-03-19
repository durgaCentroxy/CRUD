<?php
    include 'connection.php';
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `register` WHERE uname='$uname' AND password='$password'";
    $result = $connection->query($sql);
    // echo "SELECT * FROM `register` WHERE uname='$uname' AND password='$password'";
    // exit();
    while($row = $result->fetch_assoc()){
        if(mysqli_num_rows($result) > 0){
            echo gettype($row['uname']);
            // echo $row['uname'];
            if(($row['uname'] == $uname) && ($row['password'] == $password)){
                echo '
                <script>
                alert("successfully loged-in");
                window.location.href = "index.php";
                </script>
                ';
            }
            else{
                echo "no";
            }
        }
        else{
            echo "not found";
        }
    }
    // echo "$result";

    exit();
    // if($result != NULL){
    //     echo '
    //     <script>
    //     alert("successfully loged-in");
    //     window.location.href = "index.php";
    //     </script>
    //     ';
    // }
    // else
    // {
    //     echo '
    //     <script>
    //     alert("username or password may be incorrecct");
    //     window.location.href = "login.html";
    //     </script>
    //     ';
    // }
  
?>