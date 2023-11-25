

<?php
   session_start(); 

    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
    }

    if(isset($_SESSION["adm"])){
        header("Location: ../dashboard.php");
    }

    require_once '../components/db_connection.php';
    require_once 'navbar.php';
    require_once 'footer.php';
    require_once 'clean.php';

    $alert = "";

   $error = false;  

   $email = "" ; 
   $emailError = $passError = ""; 


   if(isset ($_POST["login"])){
        $email = cleanData($_POST["email"]);
        $password = cleanData($_POST["password"]);

        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $error = true ;
           $emailError = "Please enter a valid email address" ;
       }

        if (empty ($password)) {
           $error = true ;
           $passError = "Password can't be empty!";
       }

        if(!$error){
           $password = hash( "sha256", $password);

           $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";

           $result = mysqli_query($connect, $sql);

           $row = mysqli_fetch_assoc($result);

          

            if (mysqli_num_rows($result) === 1){ 
                if ($row["status"] === "adm" ){ 
                   $_SESSION["adm"] = $row["user_id"]; 
                    header( "Location: ../dashboard.php" ); 
                } else {
                   $_SESSION["user"] = $row["user_id"]; 
                 header( "Location: ../home.php" ); 
                    
                } 
            } else {
                $alert =  "<div class='alert alert-danger'>
                       <p>Something went wrong, please try again later ...</p>
                     </div>" ;
            }
            
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
            <h2 class="my-4">Login page</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?= $email ?>" >
                    <span class="text-danger"><?= $emailError ?></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</ label>
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="text-danger"><?= $passError ?></span>
                </div>
                <button name="login" type="submit" class="btn btn-primary" >Login</button>
             
                <span>you don't have an account? <a href="register.php">register here </a></span>
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