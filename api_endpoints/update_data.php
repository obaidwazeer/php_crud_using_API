<?php
    include('connection.php');
    
    if(isset($_POST)){
        $id = $_POST['id']; 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $query = "UPDATE users SET name = '$name', email = '$email', mobile = '$mobile' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if($result){
            $data = [
                'success' => 'true',
                'message' => 'Updated successfully',
                'code'    => '4'
            ];
            echo json_encode($data);
        } else{
            $data = [
                'success' => 'true',
                'message' => 'Failed to update',
                'code'    => '5'
            ];
            echo json_encode($data);
        }
    }
?>