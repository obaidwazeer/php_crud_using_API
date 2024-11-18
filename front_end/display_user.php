<?php
  $url = 'http://localhost/php_crud_using_API/api_endpoints/get_data.php';


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$users = json_decode($response, true);

// foreach ($users as $user) {
//     echo "ID: " . $user['id'] . " | Name: " . $user['name'] . " | Email: " . $user['email'] . "<br>";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Users</title>
</head>
<body>
    <div class="container">
    <button class="btn btn-primary my-5"><a href="add_user.php" class="text-decoration-none text-white">Add User</a></button>
    </div>
    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $id = 0;
    foreach($users as $user){ 
    $id += 1;
     echo '<tr>
            <th scope="row">'. $id . '</th>
            <td>'. $user['name'] . '</td>
            <td>'. $user['email'] . '</td>
            <td>'. $user['mobile'] . '</td>
            <td>
            <button class="btn btn-primary"><a href="edit_user.php?id='.$user['id'].'" class="text-decoration-none text-white">Edit</a></button>
            <button class="btn btn-danger"><a href="../api_endpoints/delete_data.php?id='.$user['id'].'" class="text-decoration-none text-white">Delete</a></button>
            </td>
        </tr>';
      }

    
    ?>
    
  </tbody>
</table>
    </div>
</body>
</html>


