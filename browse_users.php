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
                    <button type='button' onclick='tableToCSV()'>Download CSV</button>
                </div>
            </div>";

    echo "<table id='myTable'  class='display' border='1'>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Role</th>
            <th>Data Use Statement</th>
            <th>Date Registered</th>
            <th>Last Active Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    
    <tbody>";
    
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
    echo "</tbody></table></div>";

?>

<script src="js/browse_users.js"></script>

<script>

// $(document).ready(function() { 
//     $("#myTable").tablesorter() 
// }); 

$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>

<?php include 'includes/home_footer.php' ?>