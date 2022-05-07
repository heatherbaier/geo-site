<?php include 'includes/home_header.php' ?>
<?php include 'includes/admin_check.php' ?>
<?php include 'includes/greeting.php' ?>




<?php

    session_start();

    include('config.php');

    $result = mysqli_query($con, "SELECT username, email, name, role, bio, register_date, last_active FROM users_temp");

    // echo "<h2 style='font-family: 'Montserrat', sans-serif;'>Registered Users:</h2>";

    echo "<div id='table-div'>
            <div id='above-table' style='width: 100%; height: 100px; display: inline;'>
                <div style='float: left;'>
                    <h2 style='padding: 0px; font-family: Montserrat; font-weight: 200px;'>
                        Registerd Users
                    </h2>
                </div>
                <div style='float: right; padding-top: 15px; padding-right: 15px;'>
                    <a href='add_user.php'><button >Add User</button></a>
                </div>
            </div>";

    echo "<table border='1'>
    <tr>
    <th>Username</th>
    <th>Email</th>
    <th>Name</th>
    <th>Role</th>
    <th>Data Use Statement</th>
    <th>Date Registered</th>
    <th>Last Active Date</th>
    <th>Delete</th>

    </tr>";
    
    while($row = mysqli_fetch_array($result))
    {
    $uname = $row['username'];
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td>" . $row['bio'] . "</td>";
    echo "<td>" . $row['register_date'] . "</td>";
    echo "<td>" . $row['last_active'] . "</td>";
    echo "<td><button class='button' id=" . $row['username'] . ">Delete User</button></td>";
    
    echo "</tr>";
    }
    echo "</table></div>";

?>

<script>

$('.button').click(function () {
    remove_user(this);
});

function remove_user(element) {

    console.log(element.id);

    var conf = confirm("Are you sure you want to delete "  + element.id + " from the registered users? This action cannot be undone.")

    if (conf) {

        // document.cookie = "username=" + element.id;

        $.ajax({

            type : "POST",  //type of method
            url  : "remove_user.php",  //your page
            data : { username : element.id },// passing the values

            success: function(data){  
                console.log("done!")
                alert(data);
                window.location = "browse_users.php";
            }

        });
      }
}




</script>



<!-- <table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table> -->


<?php include 'includes/home_footer.php' ?>