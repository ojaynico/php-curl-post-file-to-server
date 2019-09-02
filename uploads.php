<?php
// This file can be placed on any other server or can be used in another php application
if (isset($_FILES['sentimage']['tmp_name'])) {
    // uploads is the directory where our file will uploaded on the server.
    $path = "uploads/" . $_FILES['sentimage']['name'];
    move_uploaded_file($_FILES['sentimage']['tmp_name'], $path);
}
?>
