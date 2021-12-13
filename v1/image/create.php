<?php
    require_once('../../helper/connection.php');
    require_once('../../helper/helper.php');

    $conn = init_connection();
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE); 

    if (isset($input['url'])) {
        $url = $input['url'];
        $sql = "INSERT INTO `images` VALUES(NULL, '".$url."')";

        if(!empty($sql)) {
            if(mysqli_query($conn, $sql)){
                response_json("Image created successfully!",null, 200);
                exit();
            }else{
                response_json("Error! Cannot created image!",null, 400);
                exit();
            }
        }

    }else{
        response_json("Error! Please specify image url!",null, 400);
        exit();
    }

    
    close_connection($conn);
    exit();
?>