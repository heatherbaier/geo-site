console.log("in logout file here!!");


function add_logout_button() {

    console.log("in logout button function!");

    

    var lb = document.getElementById("login-button");

    console.log(lb);

    lb.innerHTML = "Logout";
    lb.href = "logout.php";



}



