<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image"/>
    <input type="submit" value="Post"/>
</form>

<?php

if (isset($_FILES['image']['tmp_image'])) {
    $curl = curl_init();
    $curl_file = new CURLFile($_FILES['image']['tmp_image'], $_FILES['image']['type'], $_FILES['image']['name']);
    $post_data = array("sentimage" => $curl_file);

    // Set URL of the server where you wish to upload the image file
    // Your server must have code that does something similar to uploads.php (Ready to receive a file)
    // An uploads directory as in this application is require for uploads.php to work and it is where our application uploads the image
    curl_setopt($curl, CURLOPT_URL, "http://localhost/project-directory/uploads.php");

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

    $response = curl_exec($curl);

    if ($response == "true")
        echo "File posted";
    else
        echo "Error : " . curl_error($curl);
}

?>
