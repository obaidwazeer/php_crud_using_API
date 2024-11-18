<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $url = 'http://localhost/php_crud_using_API/api_endpoints/get_single_data.php?id='.$id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);

        $user = json_decode($response, true);

        if(isset($_POST['submit'])){
            $data = [
                'id' => $id,
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'mobile' => $_POST['mobile']
            ];

            $url = 'http://localhost/php_crud_using_API/api_endpoints/update_data.php';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);

            header('location:display_user.php');
        }
        
    }
    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
   
    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div class="container my-5">
        <form method = "POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $user['name'];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name = "email" value="<?php echo $user['email']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name = "mobile" value="<?php echo $user['mobile']?>">
            </div>
            <button type="submit" class="btn btn-primary" name = "submit" >Update</button>
        </form>
    </div>
    
  </body>
</html>