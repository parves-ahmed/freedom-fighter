<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    input[type=text] {
        box-sizing: border-box;
        border: none;
        border-bottom: 1px solid gray;
      }
    </style>
    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
</head>
<body>
<div class="container">
    <form style="margin-left: 20px;" action="index.php" method="POST">
      <div class="form-group row col-md-6">
          <label style="padding-top: 10px;" for="agefrom">Participient Name:</label>
          <div class="col-sm-7">
              <input name='participant' class="form-control" type="text"/>
          </div>
      </div>
      <div style="margin-left: 30px;" class="form-group row col-md-6">
          <label style="padding-top: 10px;" for="agefrom">Mobile No:</label>
          <div class="col-sm-7">
              <input name='phn-no' class="form-control" type="text"/>
          </div>
      </div>

      <h4>Report parameter</h4><br>
        <div style="margin-left: 10px;" class="form-row">
            <div class="form-group row col-md-6">
                <label for="agefrom">Age From:</label>
                <div class="col-sm-9">
                    <input name='agefrom' class="form-control" min="1" type="number"/>
                </div>
            </div>
            <div class="form-group row col-md-6">
                <label for="ageto">Age To:</label>
                <div class="col-sm-9">
                    <input name="ageto" class="form-control" min="1" type="number"/>
                </div>
            </div>
        </div>
        <div style="margin-left: 10px;" class="form-row">
            <div class="form-group row col-md-6">
                <label for="division">Division:</label>
                <div class="col-sm-9" style="margin-left: 13px;">
                    <select name="division" class="form-control">
                        <option value="">Default select</option>
                        <option value="dhaka">Dhaka</option>
                        <option value="khulna">Khulna</option>
                        <option value="sylhet">Sylhet</option>
                    </select>
                </div>
            </div>
            <div class="form-group row col-md-6">
                <label for="district">District:</label>
                <div class="col-sm-9">
                    <select name="district" class="form-control">
                        <option value="">Default select</option>
                        <option value="gazipur">gazipur</option>
                        <option value="munshigongj">munshigonj</option>
                        <option value="narail">narail</option>
                        <option value="beanibazar">beanibazar</option>
                    </select>
                </div>
            </div>
        </div>
        <div style="margin-left: 10px;" class="form-row">
            <div class="form-group row col-md-6">
                <label for="role">Role:</label>
                <div class="col-sm-9" style="margin-left: 38px; ">
                    <select name="role" class="form-control">
                        <option value="">Default select</option>
                        <option value="Commander">Commander</option>
                        <option value="Fighter">Fighter</option>
                    </select>
                </div>
            </div>
        </div>
        <div style="margin-left: 450px;">
            <button type="submit" name="search" class="btn btn-primary">Search</button>
            <button class="btn btn-primary" onclick="printContent('header')">Print</button>
        </div>
    </form>
    <hr>

    <div id="header">
        <div class="head">
            <p style="text-align: center;">An Independent Software Development Company</p>
            <h1 style="text-align: center;">Technohaven Company Limited</h1>
            <p style="text-align: center;">Fattah Plaza, 9th Floor</p>
            <p style="text-align: center;">70 Green Road, Dhaka-1205</p>
            <h4 style="text-align: center;">Freedom Fighter Report</h4>
            <p style="text-align: center;">Freedom Fighter: All</p>
            <br>
            <p style="text-align: center;">Passing Year:2017 to 2018</p>
        </div>
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
            $dbname = "freedom_fighter";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("connection failed" . $conn->connect_error);
            }

            if (isset($_POST['search'])) {
                $agefrom = $_POST["agefrom"];
                $ageto = $_POST["ageto"];
                $division = $_POST["division"];
                $district = $_POST["district"];
                $role = $_POST["role"];
                $sql = "SELECT person.PersonName, person.NID, division.DivisionName,
                            district.DistrictName, fighter.Age, fighter.Role FROM fighter 
                            INNER JOIN person ON fighter.PersonID = person.PersonID 
                            INNER JOIN district ON person.DistrictID = district.DistrictID 
                            INNER JOIN division ON district.DivisionID = division.DivisionID WHERE 1";
                if ($division != "") {
                    $sql = $sql . " and DivisionName='$division'";
                }
                if ($district != "") {
                    $sql = $sql . " and DistrictName='$district'";
                }
                if ($role != "") {
                    $sql = $sql . " and Role='$role'";
                }
                if ($ageto != "" && $agefrom != "") {
                    $sql = $sql . " and Age <= $ageto and Age>=  $agefrom";
                }

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["PersonName"];
                        $nid = $row["NID"];
                        $division = $row["DivisionName"];
                        $district = $row["DistrictName"];
                        $age = $row["Age"];
                        $role = $row["Role"];
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
                } else {
                    ?>
                    <tr>
                        <td>Row doesn't found</td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <br>
        <br>
        <div class="author">
          <p style="float: left;">Prepared by:</p>
          <p style="float: right;">Authurized by:</p>
        </div>
        <br>
        <br>
        <br>
        <p>Print Date & time: 
          <?php 
          if (isset($_POST['search'])) 
            {
               date_default_timezone_set("Asia/Dhaka");
               echo date("Y/m/d , h:i:sa");
            }  
          ?> 
        </p>
        <p>Developed by: 
          <?php 
          if (isset($_POST['search'])) 
            {
              $participant = $_POST["participant"];
              echo $participant; 
            }  ?> 
        </p>
        

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>