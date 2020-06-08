<?php
include "header.php";

require_once "phpfiles/editProfile.php";
?>

<div class="testbox">
    <h5 id="title">Feel Free to Make Changes! :)</h5>
    <hr />
</div>

<?php
getUserData();

if (null != $userData) {
?>

<form method="POST" action="phpfiles/editProfile.php" class="form-container">
    <div class="form-group">
        <p>Edit Username</p>
        <?php
            echo "<input type=\"text\" name=\"username\" placeholder=".$userData["username"]."><br />";
        ?>
    </div>

    <div class="form-group">
        <p>Edit Email</p>
        <?php
            echo "<input type=\"text\" name=\"email\" placeholder=".$userData["email"]."><br />";
        ?>
    </div>

    <div class="form-group">
        <p>Edit Country</p>
        <?php
            echo "<input type=\"text\" name=\"country\" placeholder=".$userData["country"]."><br />";
        ?>
    </div>

    <div class="form-group">
        <p>Edit Address</p>
        <?php
            echo "<input type=\"text\" name=\"address\" placeholder='".$userData["address"]."'><br />";
        ?>
    </div>

    <div class="form-group">
        <p>Edit Password</p>
        <input type="password" name="password" placeholder="New Password"><br />
    </div>

    <div class="form-group">
        <p>Enter Your Current Password in Order to Update the Profile !</p>
        <input type="password" name="current-password" placeholder="Current Password"><br />
        <input type="submit" name="commit" value="Update" class="button">
    </div>

    <p class="error">
        <?php
            showError();
        ?>
    </p>
</form>

<?php
}

include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/profile.css" />

</html>