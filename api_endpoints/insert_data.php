<?php
    header('Content-Type:application/json');
    include('connection.php');

    if(isset($_POST)){
        $name = $_POST['name1'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $query = "INSERT INTO users (name, email, mobile) VALUES ('$name', '$email', '$mobile')";
        $result = mysqli_query($conn, $query);
        if($result){
            $data = [
                'success' => 'true',
                'message' => 'Data inserted successfully',
                'code'    => '2'
            ];
 
            echo json_encode($data);
        } else{
            $data = [
                'success' => 'true',
                'message' => 'Failed to insert data',
                'code'    => '3'
            ];

            echo json_encode($data);
        }
    
    }
?>