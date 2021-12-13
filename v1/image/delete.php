<?php
    require_once('../../helper/connection.php');
    require_once('../../helper/helper.php');

    $conn = init_connection();
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE `images` FROM `images` WHERE `id`=". $id;

        $select = "SELECT * FROM `images` WHERE `id`=".$id;
        $result = $conn->query($select);
        if($result->num_rows <= 0){
            response_json("Error! ID not found!",null, 400);
            exit();
        }

        if(!empty($sql)) {
            if(mysqli_query($conn, $sql)){
                response_json("Successfully deleted image!",null, 200);
                exit();
            }else{
                response_json("Error! Cannot delete image!",null, 400);
                exit();
            }
        }

    }else{
        response_json("Error! Please specify image id!",null, 400);
        exit();
    }

    
    close_connection($conn);
    exit();
?>