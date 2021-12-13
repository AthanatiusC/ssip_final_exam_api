<?php
    require_once('../../helper/connection.php');
    require_once('../../helper/helper.php');

    $conn = init_connection();
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE); 

    if (isset($input['id']) && isset($input['url'])) {
        $id = $input['id'];
        $url = $input['url'];
        $sql = "UPDATE `images` SET `url`='".$url."' where `id`=".$id;

        $select = "SELECT * FROM `images` WHERE `id`=".$id;
        $result = $conn->query($select);
        if($result->num_rows <= 0){
            response_json("Error! ID not found!",null, 400);
            exit();
        }

        if(!empty($sql)) {
            if(mysqli_query($conn, $sql)){
                response_json("Image updated successfully!",null, 200);
                exit();
            }else{
                response_json("Error! Cannot update image!",null, 400);
                exit();
            }
        }

    }else{
        response_json("Error! Please specify image id and url!",null, 400);
        exit();
    }

    
    close_connection($conn);
    exit();
?>