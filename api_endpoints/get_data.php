<?php
    include('connection.php');

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        echo json_encode($data);
    } else{
        $data = [
            'success' => 'true',
            'message' => 'No data found',
            'code'    => '1'
        ];
        echo json_encode($data);
    }
?>