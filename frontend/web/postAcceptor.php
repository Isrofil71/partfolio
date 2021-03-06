<?php

/*******************************************************
 * Only these origins will be allowed to upload images *
 ******************************************************/


/*********************************************
 * Change this line to set the upload folder *
 *********************************************/
$imageFolder = "img/post/";

reset ($_FILES);
$temp = current($_FILES);

if (is_uploaded_file($temp['tmp_name'])){

    // Sanitize input
    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
        header("HTTP/1.0 500 Invalid file name.");
        return;
    }

    // Verify extension
    if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "jpeg", "png"))) {
        header("HTTP/1.0 500 Invalid extension.");
        return;
    }

    // Accept upload if there was no origin, or if it is an accepted origin
    $filetowrite = $imageFolder . $temp['name'];
    move_uploaded_file($temp['tmp_name'], $filetowrite);

    // Respond to the successful upload with JSON.
    // Use a location key to specify the path to the saved image resource.
    // { location : '/your/uploaded/image/file'}
    echo json_encode(array('location' => '/'.$filetowrite));
} else {
    // Notify editor that the upload failed
    header("HTTP/1.0 500 Server Error");
}
?>