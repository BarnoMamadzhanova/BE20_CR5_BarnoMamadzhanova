

<?php

    session_start(); 

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: ../index.php");
        die();
    }

    if(isset($_SESSION["adm"])){
        $id = $_GET["id"]??$_SESSION["adm"];
    } else {
        $id = $_SESSION["user"];
    }

    
    require_once '../components/db_connection.php';
    require_once '../components/upload.php';
    require_once 'navbar.php';
    require_once 'footer.php';
    require_once 'clean.php';

    $error = false;
    $alert= "";
    $fname = $lname = $email = $phone = $address = "" ; 
    $fnameError = $lnameError = $emailError = $phoneError = $addressError = "";  

    $sql = "SELECT * FROM `users` WHERE `user_id` = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $backBtn = "../home.php";

    if( isset($_SESSION["adm"])){
        $backBtn = "../users_dash.php";
    }
 

    if(isset ($_POST["edit"])){
        $fname = cleanData($_POST["fname"]);
        $lname = cleanData($_POST["lname"]);
        $email = cleanData($_POST["email"]);
        $phone = cleanData($_POST["phone"]);
        $address = cleanData($_POST["address"]);
        $photo = fileUpload($_FILES["photo"]);
        
     
         if(empty($fname)){
            $error = true;
            $fnameError = "Please, enter your first name";
        } elseif(strlen($fname) < 3){
            $error = true;
            $fnameError = "Name must have at least 3 characters." ;
        } elseif(!preg_match( "/^[a-zA-Z\s]+$/" , $fname)){
            $error = true;
            $fnameError = "Name must contain only letters and spaces." ;
        }
 
      
         if ( empty ($lname)){
            $error = true ;
            $lnameError = "Please, enter your last name" ;
        } elseif (strlen($lname) < 3 ){
            $error = true ;
            $lnameError = "Last name must have at least 3 characters." ;
        } elseif (!preg_match( "/^[a-zA-Z\s]+$/" , $lname)){
            $error = true ;
            $lnameError = "Last name must contain only letters and spaces." ;
        }

        if ( empty ($phone)){
            $error = true ;
            $phone = "date of birth can't be empty!" ;
        }
 
        
        if ( empty ($address)){
         $error = true ;
         $address = "date of birth can't be empty!" ;
        }

          
        if ($email != $row['email']) { 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $emailError = "Please enter a valid email address";
            } else {
                $query = "SELECT `email` FROM `users` WHERE `email`='$email'";
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) != 0) {
                    $error = true;
                    $emailError = "Provided Email is already in use";
                }
            }
        }


        if($_FILES["photo"]["error"] == 0){

            if($row["photo"] != "avatar.png"){
               unlink("../$row[photo]");
           }
           $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `phone_number` = '$phone', `photo` = '$photo[0]', `address` = '$address' WHERE user_id = {$id}" ;
       } else {
           $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `phone_number` = '$phone', `address` = '$address' WHERE user_id = {$id}" ;
       }

       $result = mysqli_query($connect, $sql);

            if ($result) {
                $alert = "<div class='alert alert-success'>
                    <p>Account has been updated!</p>
                </div>";
                header( "refresh: 3; url=$backBtn" );
            } else {
                $alert = "<div class='alert alert-danger'>
                    <p>Something went wrong, {$photo[1]}</p>
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

<div class="container my-5">
    <div class="form my-5 register">
    <h2 class="mt-5">Edit profile</h2>
            <form method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="mb-3 mt-3" >
                    <label for="fname" class="form-label">First name </label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="<?= $row["first_name"]??""; ?>" >
                    <span class="text-danger"><?= $fnameError ?></span>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last name </label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="<?= $row["last_name"]??""; ?>" >
                    <span class="text-danger"><?= $lnameError ?></span>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="text" class= "form-control" id="phone" name="phone" value="<?= $row["phone_number"]??""; ?>" >
                    <span class="text-danger"><?= $phoneError ?></span>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Profile photo </label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?= $row["email"]??""; ?>" >
                    <span class="text-danger"><?= $emailError ?></span>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class= "form-control" id="address" name="address" value="<?= $row["address"]??""; ?>" >
                    <span class="text-danger"><?= $addressError ?></span>
                </div>

                <button name="edit" type="submit" class="btn btn-primary">Save changes</button>
                <a href="<?= $backBtn ?>" class="btn btn-secondary">Back</a>

            </form>
    </div>

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