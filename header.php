<?php
require_once './phpfiles/startSession.php';
include "./phpfiles/headerController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/png" href="images/user.png" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Fashion e-Shop</title>
</head>

<body>
    <header id="top">
        <img src="images/banner2.jpg" alt="Fashion e-Shop" class="banner" />
        <h1>Fashion e-Shop</h1>
    </header>

    <div class="navbar">
        <a href="index.php">
            <p>Home</p>
        </a>

        <div class="dropdown">
            <button class="dropbtn">
                Men
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <div class="row_submenu">
                    <div class="column_submenu">
                        <h3>Events</h3>
                        <?php showOptions("event", "men") ?>
                        <h3>Fabrics</h3>
                        <?php showOptions("fabric", "men") ?>
                    </div>
                    <div class="column_submenu">
                        <h3>Seasons</h3>
                        <?php showOptions("season", "men") ?>
                        <h3>Brands</h3>
                        <?php showOptions("brand", "men") ?>

                        <a href="shop.php?gender=men" style="padding-top: 15px;"><b>ALL</b></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">
                Women
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <div class="row_submenu">
                    <div class="column_submenu">
                        <h3>Events</h3>
                            <?php showOptions("event", "women") ?>
                        <h3>Fabrics</h3>
                            <?php showOptions("fabric", "women") ?>
                    </div>
                    <div class="column_submenu">
                        <h3>Seasons</h3>
                            <?php showOptions("season", "women") ?>
                        <h3>Brands</h3>
                            <?php showOptions("brand", "women") ?>    

                        <a href="shop.php?gender=women" style="padding-top: 15px;"><b>ALL</b></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">
                Kids
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <div class="row_submenu">
                    <div class="column_submenu">
                        <h3>Events</h3>
                            <?php showOptions("event", "kids") ?>  
                        <h3>Fabrics</h3>
                            <?php showOptions("fabric", "kids") ?>   
                    </div>
                    <div class="column_submenu">
                        <h3>Seasons</h3>
                            <?php showOptions("season", "kids") ?> 
                        <h3>Brands</h3>
                            <?php showOptions("brand", "kids") ?> 

                        <a href="shop.php?gender=kids" style="padding-top: 15px;"><b>ALL</b></a>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $message ?>
    </div>