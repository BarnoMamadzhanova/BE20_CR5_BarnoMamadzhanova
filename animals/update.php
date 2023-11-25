<?php

    session_start();

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: ../index.php");
    }

    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
    }
    

    require_once '../components/db_connection.php';
    require_once 'navbar.php';
    require_once 'footer.php';
    require_once '../components/upload.php';

    $alert = "";

    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id = $_GET["id"]; 
        $sql = "SELECT * FROM `animals` WHERE `animal_id` = $id";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);

    }


        if(isset ($_POST["update"])){
            $name = $_POST["name"];
            $age = $_POST["age"];
            $location = $_POST["location"];
            $description = $_POST["description"];
            $size = $_POST["size"];
            $vaccinated = $_POST["vaccinated"];
            $breed = $_POST["breed"];
            $status = $_POST["status"];
            $photo = fileUpload($_FILES["photo"], "animals");
    
            
            if($_FILES["photo"]["error"] == 0){
                if($row["photo"] != "default.png"){
                    unlink("../$row[photo]"); 
                }
                $sql = "UPDATE `animals` SET `name` = '$name', `location` = '$location', `photo` = '$photo[0]', `description` = '$description', `size` = '$size', `age` = $age, `vaccinated` = $vaccinated, `breed` = '$breed', `status` = '$status' WHERE `animal_id` = $id";
            }else {
                $sql = "UPDATE `animals` SET `name` = '$name', `location` = '$location', `description` = '$description', `size` = '$size', `age` = $age, `vaccinated` = $vaccinated, `breed` = '$breed', `status` = '$status' WHERE `animal_id` = $id";
            }


            if(mysqli_query($connect, $sql)){
                $alert = "<div class='alert alert-success' role='alert'>
                Profile has been updated, {$photo[1]}
            </div>";
            header("refresh: 3; url= ../dashboard.php");
            }else {
                $alert = "<div class='alert alert-danger' role='alert'>
                error found, {$photo[1]}
            </div>";
            }
        }

    mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.scss">
 
    <title>Pet adoption</title>
</head>
<body>

<!-- ********************************************************************************************************* -->
<!------------------------------------- Navbar ------------------------------------------------------------------>
<!-- ********************************************************************************************************* -->

<div class="nav">

   <?php echo $navbar ?>

</div>
    
<!-- ********************************************************************************************************* -->
<!------------------------------------- Main Section ------------------------------------------------------------>
<!-- ********************************************************************************************************* -->

<div class="container mt-5 mb-5">
    
    <h2 class="myForm">Add a new animal </h2>
       <form method="POST" enctype= "multipart/form-data">
           <div class="mb-3 mt-3">
               <label for="name" class= "form-label">Name</label>
               <input  type="text" class="form-control" id="name" aria-describedby="name" name="name" value="<?= $row["name"]??"" ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Age</label>
                <input type="number" class="form-control"  id="age"  aria-describedby="age"  name="age" value="<?= $row["age"]??"" ?>">
            </div>
            <div class="mb-3 mt-3">
               <label for="description" class= "form-label">Description</label>
               <input  type="text" class="form-control" id="description" aria-describedby="description" name="description" value="<?= $row["description"]??"" ?>">
            </div>
            <div class="mb-3 mt-3">
               <label for="location" class= "form-label">Location</label>
               <input  type="text" class="form-control" id="location" aria-describedby="location" name="location" value="<?= $row["location"]??"" ?>">
            </div>
            <div class="mb-3 mt-3">
               <label for="breed" class= "form-label">Breed</label>
               <input  type="text" class="form-control" id="breed" aria-describedby="breed" name="breed" value="<?= $row["breed"]??"" ?>">
            </div>
            <div class="mb-3 mt-3">
               <label for="size" class= "form-label">Size</label>
               <select name="size" class="form-control" id="size" aria-describedby="size">
                    <option value="Small">small</option>
                    <option value="Medium">medium</option>
                    <option value="Large">large</option>
               </select>
            </div>
            <div class="mb-3 mt-3">
               <label for="status" class= "form-label">Availability</label>
               <select name="status" class="form-control" id="status" aria-describedby="status">
                    <option value="Available">Available</option>
                    <option value="Adopted">Adopted</option>
               </select>
            </div>
            <div class="mb-3 mt-3">
               <label for="vaccinated" class= "form-label">Vaccine</label>
               <select name="vaccinated" class="form-control" id="vaccinated" aria-describedby="vaccinated">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
               </select>
            </div>
           <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type = "file" class="form-control" id="photo" aria-describedby="photo"   name="photo">
            </div>
            <button name="update" type="submit" class="btn btn-warning text-secondary">Edit profile</button>
            <a href="../dashboard.php" class="btn btn-secondary text-warning">Back to home page</a>
        </form>

        <div class="alert">

            <?php echo $alert ?>

        </div>

</div>


<!-- ********************************************************************************************************* -->
<!------------------------------------- Footer ------------------------------------------------------------------>
<!-- ********************************************************************************************************* -->

<div class="footer">

   <?php echo $footer ?>

</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>