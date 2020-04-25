<?php
include 'header.php';
?>

<div class="testbox">
    <h5 id="title">Registration</h5>
    <hr />

    <?php
    if (@$_GET['UserExist'] == true) {
    ?>
        <div>
            <img style="height:2%; width:2%;" src="images/wrong.jpg" />
            <?php echo $_GET['UserExist'] ?>
        </div>
    <?php
    }
    if (@$_GET['InvalidPass'] == true) {
    ?>
        <div>
            <img style="height:2%; width:2%;" src="images/wrong.jpg" />
            <?php echo $_GET['InvalidPass'] ?>
        </div>

    <?php
    }
    if (@$_GET['InvalidEmail'] == true) {
    ?>
        <div>
            <img style="height:2%; width:2%;" src="images/wrong.jpg" />
            <?php echo $_GET['InvalidEmail'] ?>
        </div>

    <?php
    }
    if (@$_GET['InvalidEmailPas'] == true) {
    ?>
        <div>
            <img style="height:2%; width:2%;" src="images/wrong.jpg" />
            <?php echo $_GET['InvalidEmailPas'] ?>
        </div>

    <?php
    }
    ?>
</div>

<div class="form-wrapper">
    <div class="register-image">
        <img src="images/register.png" alt="sing up image" />
    </div>

    <form method="POST" action="phpfiles/register.php">
        <span id="eroare"></span>

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
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="repeatpassword">
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="register">Register</button>
        </div>

        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</div>
</body>
</html>