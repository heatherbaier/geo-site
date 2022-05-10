<?php include 'includes/home_header.php' ?>
<?php include 'includes/admin_check.php' ?>


<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $prole = "Admin";
        $bio = $_POST['bio'];
        $pname = $_POST['name'];
        $rtime = date("Y/m/d h:i:sa");

        $pbio = $_POST['bio'];
        $ppronouns = $_POST['pronouns'];
        $pgradyear = $_POST['gradyear'];
        $plinkedin = $_POST['linkedin'];

        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users_temp WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }

        if ($query->rowCount() == 0) {

            // Add to general users table
            $query = $connection->prepare("INSERT INTO users_temp(username,password,email,name,role,bio,register_date) VALUES (:username,:password_hash,:email,:pname,:prole,:bio,:rtime)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("pname", $pname, PDO::PARAM_STR);
            $query->bindParam("bio", $bio, PDO::PARAM_STR);
            $query->bindParam("prole", $prole, PDO::PARAM_STR);
            $query->bindParam("rtime", $rtime, PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                echo '<p class="success">User added successsfully to user table!</p>';
                // exit;
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }

            // Add to Admin table
            $query = $connection->prepare("INSERT INTO admin_profiles(name,pronouns,gradyear,linkedin,bio,username) VALUES (:pname,:ppronouns,:pgradyear,:plinkedin,:pbio,:username)");
            $query->bindParam("pname", $pname, PDO::PARAM_STR);
            $query->bindParam("ppronouns", $ppronouns, PDO::PARAM_STR);
            $query->bindParam("pgradyear", $pgradyear, PDO::PARAM_STR);
            $query->bindParam("plinkedin", $plinkedin, PDO::PARAM_STR);
            $query->bindParam("pbio", $pbio, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                echo '<p class="success">User added successsfully to Admin table!</p>';
                // exit;
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }

        }
    }
?>


<!-- <div class="center"> -->
    <form method="post" action="" name="signup-form">
        <div class="form-element">
            <label>Name</label>
            <input type="text" name="name" required />
        </div>    
        <div class="form-element">
            <label>Username</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Email</label>
            <input type="email" name="email" required />
        </div>
        <div class="form-element">
            <label>Password</label>
            <input type="password" name="password" required />
        </div>    
        <div class="form-element">
            <label>Pronouns</label>
            <input type="text" name="pronouns" required />
        </div>
        <div class="form-element">
            <label>Graduation Year</label>
            <input type="text" name="gradyear" required />
        </div>
        <div class="form-element">
            <label>LinkedIn</label>
            <input type="text" name="linkedin" required />
        </div>    
        <div class="form-element">
            <label>Bio</label>
            <input type="text" name="bio" required />
        </div>
        <button type="submit" name="register" value="register">Register</button>
    </form>

<!-- </div> -->



<?php include 'includes/home_footer.php' ?>