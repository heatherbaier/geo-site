<?php include 'includes/header.php' ?>




<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $last_active = date("Y/m/d h:i:sa");

        $query = $connection->prepare("SELECT * FROM users_temp WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
              
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_name'] = $result['name'];
				        $_SESSION['role'] = $result['role'];

                $uid = $result['id'];

                $la_updateq = $connection->prepare("UPDATE users_temp SET last_active=:last_active WHERE id=:uid");
                $la_updateq->bindParam("last_active", $last_active, PDO::PARAM_STR);
                $la_updateq->bindParam("uid", $uid, PDO::PARAM_STR);
                $la_result = $la_updateq->execute();

                // echo '<p class="success">Congratulations, you are logged in!</p>';

				if ($result['role'] == "Admin") {
					header("Location: admin.php");
				} else{
					header("Location: home.php");
				}

                exit;				
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
?>





<div class="center">
  <form method="post" action="" name="signin-form">
    <div class="form-element">
      <label>Username</label>
      <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
      <label>Password</label>
      <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
  </form>
</div>


<!-- <script>
function add_logout_button() {
    console.log("in logout button function!")
}
</script> -->


<?php include 'includes/footer.php' ?>
