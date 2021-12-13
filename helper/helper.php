<?php
    function response_json($message,$data, $code) {
        http_response_code($code);
        header('Content-Type: application/json');
        $data = array(
            'message' => $message,
            'data' => $data
        );
        echo json_encode($data);
    }
?>