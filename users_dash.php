

<?php
    session_start();

    if(!isset($_SESSION["user"]) && !isset($_SESSION[ "adm"])){ 
        header("Location: users/login.php"); 
    }

    require_once 'components/db_connection.php';
    require_once 'components/navbar.php';
    require_once 'components/footer.php';
    
    $sql = "SELECT * FROM `users` WHERE `user_id` = {$_SESSION["adm"]}"; 

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);


    $sqlUsers = "SELECT * FROM `users` WHERE `status` != 'adm'";
    $resultUsers = mysqli_query($connect, $sqlUsers);

    $layout = "";

    if(mysqli_num_rows($resultUsers) > 0){
        while($userRow = mysqli_fetch_assoc($resultUsers)){
            $layout .= "<div>
            <div class='card myCard1'>
                <img src='{$userRow["photo"]}' class='card-img-top myCardImg1' alt='{$userRow["first_name"]}'>
                <div class='card-body'>
                <h5 class='card-title'>{$userRow["first_name"]} {$userRow["last_name"]}</h5>
                <p class='card-text'>{$userRow["email"]}</p>
                <p class='card-text'>{$userRow["phone_number"]}</p>
                <p class='card-text'>{$userRow["address"]}</p>
                <a href='users/edit.php?id={$userRow["user_id"]}' class='btn btn-outline-warning'>Update</a>
            </div>
        </div>
        </div>" ;
        }
    }else  {
        $layout .= "No results found!" ;
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
    <link rel="stylesheet" href="style/style.scss">
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
<!------------------------------------- User Cards ------------------------------------------------------------------>
<!-- ********************************************************************************************************* -->




<div class="container mt-5 mb-5">

        <?php if(!empty($userRow)) { ?>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="<?= $userRow["photo"] ?>" class="img-fluid rounded-start" alt="<?= $userRow["first_name"] . " " . $userRow["last_name"] ?>">                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $row["first_name"] . " " . $row["last_name"] ?></h5>
                </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1 g-4">
            <?= $layout ?>
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
