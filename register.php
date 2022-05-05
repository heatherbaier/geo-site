<?php include 'includes/header.php' ?>

<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $prole = $_POST['role'];
        $bio = $_POST['bio'];
        $pname = $_POST['name'];
        $rtime = date("Y/m/d h:i:sa");

        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users_temp WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }

        if ($query->rowCount() == 0) {

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
                echo '<p class="success">Your registration was successful!</p>';
                header("Location: login.php");
                exit;
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?>

<div class="center">
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
            <label for="role">Role</label>
            <select id="role" name="role">
                <option value="Researcher/Academia">Researcher/Academia</option>
                <option value="Industry Professional">Industry Professional</option>
                <option value="Parent">Parent</option>
            </select>

        </div>
        <div class="form-element">
            <label style="font-size: 20px;">Please provide a short desciprtion of how you intend to use GEO's data</label>
            <input type="text" name="bio" required />
        </div>
        <button type="submit" name="register" value="register">Register</button>
    </form>
</div>

<?php include 'includes/footer.php' ?>
