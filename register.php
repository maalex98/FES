<?php
include "header.php";
include "phpfiles/register.php";
?>

<div class="testbox">
    <h5 id="title">Registration</h5>
    <hr />
</div>

<div class="form-wrapper">
    <div class="register-image">
        <img src="images/register.png" alt="sing up image" />
    </div>

    <form method="POST" action="phpfiles/register.php">
        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="firstname">
        </div>

        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="lastname">
        </div>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>

        <div class="input-group">
            <label>Country</label>
            <input type="text" name="country">
        </div>

        <div class="input-group">
            <label>Address - County, City, Street and Street Number</label>
            <input type="text" name="address">
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="repeatpassword">
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="register">Register</button>
        </div>

        <p class="error">
            <?php
                showError();
            ?>
        </p>

        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</div>

<footer>
    <div class="share">
        <div class="share-content">
            <p>FOLLOW US</p>
            <a class="share-logo" href="https://www.facebook.com">
                <i class="fa fa-facebook-square"></i>
            </a>

            <a class="share-logo" href="https://www.twitter.com">
                <i class="fa fa-twitter-square"></i>
            </a>

            <a class="share-logo" href="https://www.instagram.com">
                <i class="fa fa-youtube-square"></i>
            </a>

            <a class="share-logo" href="https://www.instagram.com">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>
</footer>

</body>

<link rel="stylesheet" type="text/css" href="styles/account.css" />

</html>