

<?php

    session_start();

    require_once  'components/db_connection.php';
    require_once 'components/navbar.php';
    require_once 'components/footer.php';

   $sql = "SELECT * FROM animals WHERE `status` = 'Available'" ;

   $result = mysqli_query($connect, $sql);

   $cards = "" ;

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){

           $vaccinated = ($row["vaccinated"]) ? '<mark>vaccinated</mark>' : 'not vaccinated' ;

           $cards .= "
           <div>
            <div class='card'>
                <img src='{$row["photo"]}' class='card-img-top cardImg' alt='{$row["name"]}'>
                <div class='card-body body'>
                <h5 class='card-title'>{$row["name"]}</h5>
                </div>
                <ul class='list-group list-group-flush'>
                <li class='list-group-item'>Breed: {$row["breed"]}</li>
                    <li class='list-group-item'>Size: {$row["size"]}</li>
                    <li class='list-group-item'>Age: {$row["age"]}</li>
                    <li class='list-group-item'>Vaccine: {$vaccinated}</li>
                </ul>
                <div class='card-body'>
                <a href='animals/details.php?id={$row["animal_id"]}' class='btn btn-outline-secondary'>Show more</a>
                </div>
            </div>
         </div>" ;
       }
   } else  {
       $cards = "<p>No results found</p>" ;
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
<!------------------------------------- Cards ------------------------------------------------------------------>
<!-- ********************************************************************************************************* -->

<div class="container mt-5 mb-5">
    <div class="index">
        <h4 class="my-3">Welcome to our home page</h4>
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1 g-4">
            <?= $cards ?>
        </div>
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

