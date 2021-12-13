<?php
    // create class for connection
    class Connection {
        function connect_db() {
            // connect to mysql database
            $DB_HOST = 'localhost';
            $DB_USER ='root';
            $DB_PASSWORD = '';
            $DB_NAME = 'image_database';
            $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
            // check connection 
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            // return database handler
            return $conn;
        }
    }

    function init_connection(){
        $connection = new Connection();
        $conn = $connection->connect_db();
        return $conn;
    }

    function close_connection($conn){
        $conn->close();
    }
?>