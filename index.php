<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <style type="text/css">
          .wrapper { 
              width: 1200px;
              margin: 0 auto;
              
          }
      </style>
  </head>
  <body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
              <h2 class="text-center">CUSTOMER'S INFORMATION</h2>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">LIST</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Customer</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all cars
                    $data = "SELECT * FROM info";
                    if($info = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($info) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>id</th>
                                        <th>fullname</th>
                                        <th>address</th>
                                        <th>age</th>
                                        <th>birthdate</th>
                                        <th>contact</th>
                                        <th>email</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($customer = mysqli_fetch_array($info)) {
                                    echo "<tr>
                                            <td>" . $customer['id'] . "</td>
                                            <td>" . $customer['fullname'] . "</td>
                                            <td>" . $customer['address'] . "</td>
                                            <td>" . $customer['age'] . "</td>
                                            <td>" . $customer['birthdate'] . "</td>
                                            <td>" . $customer['contact'] . "</td>
                                            <td>" . $customer['email'] . "</td>
                                            <td>
                                              <a href='read.php?id=". $customer['fullname'] ."' title='View customer' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=". $customer['fullname'] ."' title='Edit customer' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=". $customer['fullname'] ."' title='Delete customer' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($info);
                        } else{
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>