<script>
    var data = <?php echo json_encode($_SESSION['user_name'], JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!
    const node = document.createElement("h1");
    node.style.fontFamily = 'Montserrat';
    const outerdiv = document.createElement("div");
    const textnode = document.createTextNode("Welcome " + data + "!");
    node.appendChild(textnode);
    outerdiv.appendChild(node);
    outerdiv.style.float = "left";
    outerdiv.style.marginLeft = "220px";
    outerdiv.id = "greeting";
    // outerdiv.class = "page-content inset"
    document.getElementById("header-cont").appendChild(outerdiv);
</script>