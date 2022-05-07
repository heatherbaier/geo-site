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


function tableToCSV() {
 
    // Variable to store the final csv data
    var csv_data = [];

    // Get each row data
    var rows = document.getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {

        // Get each column data
        var cols = rows[i].querySelectorAll('td,th');

        // Stores each csv row data
        var csvrow = [];
        for (var j = 0; j < cols.length; j++) {

            // Get the text data of each cell
            // of a row and push it to csvrow
            csvrow.push(cols[j].innerHTML);
        }

        // Combine each column value with comma
        csv_data.push(csvrow.join(","));
    }

    // Combine each row data with new line character
    csv_data = csv_data.join('\n');

    // Call this function to download csv file 
    downloadCSVFile(csv_data);

}

function downloadCSVFile(csv_data) {

    // Create CSV file object and feed
    // our csv_data into it
    CSVFile = new Blob([csv_data], {
        type: "text/csv"
    });

    // Create to temporary link to initiate
    // download process
    var temp_link = document.createElement('a');

    var d = new Date();
    var csv_name = "geousers_" + d.getMonth() + "/" + d.getDate() + "/" + d.getFullYear() + ".csv";
    console.log(csv_name);

    // Download csv file
    temp_link.download = csv_name;
    var url = window.URL.createObjectURL(CSVFile);
    temp_link.href = url;

    // This link should not be displayed
    temp_link.style.display = "none";
    document.body.appendChild(temp_link);

    // Automatically click the link to
    // trigger download
    temp_link.click();
    document.body.removeChild(temp_link);

}
