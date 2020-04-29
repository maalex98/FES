<?php
require_once './phpfiles/startSession.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/png" href="images/logo2.png" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="stylesheet" type="text/css" href="styles/buton.css" />
    <link rel="stylesheet" type="text/css" href="styles/gallery.css" />
    <link rel="stylesheet" type="text/css" href="styles/shop.css" />
    <link rel="stylesheet" type="text/css" href="styles/account.css" />
    <link rel="stylesheet" type="text/css" href="styles/profile.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" />
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
                        <a href="shop.php?gender=male&event=office">Christmas</a>
                        <a href="shop.php?gender=male&event=graduation">Graduation</a>
                        <a href="shop.php?gender=male&event=wedding">Weeding</a>
                        <a href="shop.php?gender=male&event=halloween">Halloween</a>
                        <h3>Trends</h3>
                        <a href="shop.php?gender=male&trends=sweetsneaks">Sport</a>
                        <a href="shop.php?gender=male&trends=90remix">Office</a>
                        <a href="shop.php?gender=male&trends=lookslove">Looks We Love</a>
                        <a href="shop.php?gender=male&trends=modern">Modern</a>
                    </div>
                    <div class="column_submenu">
                        <h3>Seasons</h3>
                        <a href="shop.php?gender=male&season=summer">Summer</a>
                        <a href="shop.php?gender=male&season=autumn">Autumn</a>
                        <a href="shop.php?gender=male&season=winter">Winter</a>
                        <a href="shop.php?gender=male&season=spring">Spring</a>
                        <h3>New Arrivals</h3>
                        <a href="shop.php?gender=male&brand=nikeair">Something Fashion</a>
                        <a href="shop.php?gender=male&brand=gucci">Something More Fashion</a>
                        <a href="shop.php?gender=male&brand=supreme">The Best Fashion Ever</a>

                        <a href="shop.php?gender=male" style="padding-top: 15px;"><b>ALL</b></a>
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
                        <a href="shop.php?gender=female&event=office">Christmas</a>
                        <a href="shop.php?gender=female&event=graduation">Graduation</a>
                        <a href="shop.php?gender=female&event=wedding">Weeding</a>
                        <a href="shop.php?gender=female&event=halloween">Halloween</a>
                        <h3>Trends</h3>
                        <a href="shop.php?gender=female&trends=sweetsneaks">Sport</a>
                        <a href="shop.php?gender=female&trends=90remix">Office</a>
                        <a href="shop.php?gender=female&trends=lookslove">Looks We Love</a>
                        <a href="shop.php?gender=female&trends=modern">Modern</a>
                    </div>
                    <div class="column_submenu">
                        <h3>Seasons</h3>
                        <a href="shop.php?gender=female&season=summer">Summer</a>
                        <a href="shop.php?gender=female&season=autumn">Autumn</a>
                        <a href="shop.php?gender=female&season=winter">Winter</a>
                        <a href="shop.php?gender=female&season=spring">Spring</a>
                        <h3>New Arrivals</h3>
                        <a href="shop.php?gender=female&brand=nikeair">Something Fashion</a>
                        <a href="shop.php?gender=female&brand=gucci">Something More Fashion</a>
                        <a href="shop.php?gender=female&brand=supreme">The Best Fashion Ever</a>

                        <a href="shop.php?gender=female" style="padding-top: 15px;"><b>ALL</b></a>
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
                        <a href="shop.php?gender=kids&event=office">Christmas</a>
                        <a href="shop.php?gender=kids&event=graduation">Graduation</a>
                        <a href="shop.php?gender=kids&event=wedding">Weeding</a>
                        <a href="shop.php?gender=kids&event=halloween">Halloween</a>
                        <h3>Trends</h3>
                        <a href="shop.php?gender=kids&trends=sweetsneaks">Sport</a>
                        <a href="shop.php?gender=kids&trends=90remix">Office</a>
                        <a href="shop.php?gender=kids&trends=lookslove">Looks We Love</a>
                        <a href="shop.php?gender=kids&trends=modern">Modern</a>
                    </div>
                    <div class="column_submenu">
                        <h3>Seasons</h3>
                        <a href="shop.php?gender=kids&season=summer">Summer</a>
                        <a href="shop.php?gender=kids&season=autumn">Autumn</a>
                        <a href="shop.php?gender=kids&season=winter">Winter</a>
                        <a href="shop.php?gender=kids&season=spring">Spring</a>
                        <h3>New Arrivals</h3>
                        <a href="shop.php?gender=kids&brand=nikeair">Something Fashion</a>
                        <a href="shop.php?gender=kids&brand=gucci">Something More Fashion</a>
                        <a href="shop.php?gender=kids&brand=supreme">The Best Fashion Ever</a>

                        <a href="shop.php?gender=kids" style="padding-top: 15px;"><b>ALL</b></a>
                    </div>
                </div>
            </div>
        </div>

        <a href="aboutUs.php">
            <p>About Us</p>
        </a>

        <?php echo $message ?>
    </div>