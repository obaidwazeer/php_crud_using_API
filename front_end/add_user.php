<?php
  // include('api_endpoints/connection.php');
  $url = 'http://localhost/php_crud_using_API/api_endpoints/insert_data.php';
  // $eur = 'http://localhost/api_endpoints/insert_data.php';

  if(isset($_POST['submit'])){
    $data = [
      'name1' => $_POST['name'],
      'email' => $_POST['email'],
      'mobile' => $_POST['mobile']
    ];

    $ch = curl_init($url);

    // Set cURL options for POST request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    // Execute the request
    $response = curl_exec($ch);


    // Check for errors
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    } else {
      // Display response
    }

    // Close the cURL session
    curl_close($ch);
    header('location:display_user.php');
  }

  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     -->
    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div class="container my-5">
        <form method = "POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name = "name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name = "email">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name = "mobile">
            </div>
            <button type="submit" class="btn btn-primary" name = "submit" >Submit</button>
        </form>
    </div>
    
  </body>
</html>