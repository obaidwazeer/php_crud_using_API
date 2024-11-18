<?php
    include('connection.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            // $data = [
            //     'success' => true,
            //     'message' => 'Data returned successfully',
            //     'data' => $row
            // ];
            
            echo json_encode($row);
        } else{
            $data = [
                'success' => true,
                'message' => 'No record Found'
            ];
            echo json_encode($data);
        }
    }
?>