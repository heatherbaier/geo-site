<?php include 'includes/home_header.php' ?>
<?php include 'includes/admin_check.php' ?>
<?php include 'includes/greeting.php' ?>


<?php

    session_start();
    include('config.php');
    if (isset($_POST['edit_profile'])) {

        $pusername = $_SESSION['username'];
        $pname = $_POST['name'];
        $pbio = $_POST['bio'];
        $ppronouns = $_POST['pronouns'];
        $pgradyear = $_POST['gradyear'];
        $plinkedin = $_POST['linkedin'];

        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM admin_profiles WHERE username=:pusername");
        $query->bindParam("pusername", $pusername, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() == 0) {
            echo '<p class="error">No user with this username exists!</p>';
        }

        if ($query->rowCount() == 1) {

            $query = $connection->prepare("UPDATE admin_profiles SET name=:pname,pronouns=:ppronouns,gradyear=:pgradyear,linkedin=:plinkedin,bio=:pbio WHERE username=:pusername");

            $query->bindParam("pname", $pname, PDO::PARAM_STR);
            $query->bindParam("ppronouns", $ppronouns, PDO::PARAM_STR);
            $query->bindParam("pgradyear", $pgradyear, PDO::PARAM_STR);
            $query->bindParam("plinkedin", $plinkedin, PDO::PARAM_STR);
            $query->bindParam("pbio", $pbio, PDO::PARAM_STR);
            $query->bindParam("pusername", $pusername, PDO::PARAM_STR);


            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Information updated successfully!</p>';
                // exit;
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?>

<form method="post" action="" name="profile-form">
        <div class="form-element">
            <label>Name</label>
            <input type="text" name="name" required />
        </div>    
        <!-- <div class="form-element">
            <label>Username</label>
            <input type="text" name="username" required />
        </div>             -->
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
        <button type="submit" name="edit_profile" value="edit_profile">Submit Changes</button>
    </form>


<?php include 'includes/home_footer.php' ?>