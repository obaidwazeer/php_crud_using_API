<?php
    include('connection.php');
    
    if(isset($_GET)){
        $id = $_GET['id'];
        $query = "DELETE FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if($result){
            $data = [
                'success' => 'true',
                'message' => 'Deleted successfully',
                'code'    => '6'
            ];
            echo json_encode($data);
            header('location:../front_end/display_user.php');
        } else{
            $data = [
                'success' => 'true',
                'message' => 'Failed to delete',
                'code'    => '7'
            ];
            echo json_encode($data);
        }
    }
?>