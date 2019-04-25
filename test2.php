<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

  <div class="container">
      <div class="row">
        <table class="table table-boarder">
          <thead>
            <tr>
              <th>Name</th>
              <th>NID</th>
              <th>Division</th>
              <th>District</th>
              <th>Age</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "free";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error){
                die('Connect Error (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
            }
            echo "connected successfully";
            echo $sql = "SELECT per.per_name, per.nid, divi.divi_name,dis.dis_name, fight.age, fight.role FROM fight INNER JOIN per ON fight.per_id = per.per_id 
            INNER JOIN dis ON per.dis_id = dis.dis_id INNER JOIN divi ON dis.divi_id = divi.divi_id WHERE role='fighter'";
             
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['per_name'];
                            $nid = $row['nid'];
                            $division = $row['divi_name'];
                            $district = $row['dis_name'];
                            $age = $row['age'];
                            $role = $row['role'];
                        ?>
                        <tr>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $nid; ?></td>
                          <td><?php echo $division; ?></td>
                          <td><?php echo $district; ?></td>
                          <td><?php echo $age; ?></td>
                          <td><?php echo $role; ?></td>
                        </tr>
                        <?php
                        }
                    }
                    else{
                        ?>
                        <tr>
                          <td>Row doesn't found</td>
                        </tr>
                       <?php 
                    }

                
                    
            
            ?>
          </tbody>
        </table>
      </div>
 </div>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  

</body>
</html>