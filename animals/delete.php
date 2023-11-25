

<?php

    session_start();

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: ../index.php");
    }

    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
    }

    require_once '../components/db_connection.php';
    require_once '../components/upload.php';
    

    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id = $_GET["id"]; // to take the value from the parameter "id" in the url 
        $sql = "SELECT * FROM `animals` WHERE `animal_id` = $id"; // finding the product 
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);  // fetching the data 
        if($row["photo"] !== "default.png"){ // if the picture is not product.png (the detault picture) we will delete the picture
            unlink("../assets/$row[photo]");
        }

        $sql1 = "DELETE FROM `animals` WHERE `animal_id` = $id";
        mysqli_query($connect, $sql1);

        header("Location: ../dashboard.php");
    } 
    else {
        echo "Error";
        header("Location: ../index.php");
    }
    
    mysqli_close($connect);
    
        
?>