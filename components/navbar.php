

<?php

    $navbar = "
    <nav class='navbar navbar-expand-lg fixed-top bg-body-tertiary'>
        <div class='container-fluid'>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarTogglerDemo01' 
            aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
            <a class='navbar-brand' href='index.php'><img src='assets/logo.png' class='logoImg' alt='logo'></a>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
                </li>";

                if(isset($_SESSION["adm"])){
                    $navbar .= "
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='users_dash.php'>Users</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='dashboard.php'>Pets</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='animals/create.php'>Add pet</a>
                    </li>";
                }

                $navbar .= (isset($_SESSION["user"]) || isset($_SESSION["adm"])) ?
                    "<li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='users/edit.php'>Edit profile</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='users/logout.php'>Logout</a>
                    </li>":
                    "<li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='users/register.php'>Register</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='users/login.php'>Log in</a>
                    </li>";


                
                $navbar .= " 
                </ul>
            </div>
        </div>
    </nav>
";

                // <li class='nav-item'>
                // <a class='nav-link' href='animals/create.php'>Add a pet</a>
                // </li>
                // <li class='nav-item'>
                // <a class='nav-link' href='dashboard.php'>Dash</a>
                // </li>
                // <li class='nav-item'>
                // <a class='nav-link' href='users/register.php'>Register</a>
                // </li>


    // #27296D