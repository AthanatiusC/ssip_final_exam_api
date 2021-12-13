<?php
    require_once('../helper/connection.php');
    require_once('../helper/helper.php');

    $conn = init_connection();
    $sql = "SELECT * FROM `images`";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = $sql." WHERE `id`=". $id;
    }

    if (isset($_GET['limit'])) {
        $limit = $_GET['limit'];
        $sql = $sql." LIMIT ".$limit;
    }

    $result = $conn->query($sql);
    $districts = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($districts, array(
                'id' => $row['id'],
                'url' => $row['url'],
            ));
        }
    }else{
        response_json("Error! No data found!",$districts, 404);
        exit();
    }

    response_json(count($districts)." Data Successfully returned!",$districts,200);
    close_connection($conn);
    exit();
?>