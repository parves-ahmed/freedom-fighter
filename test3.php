<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
    <script>
        function printContent(el){
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
      <h4>Report parameter</h4><br>
          <form style="margin-left: 20px;" action="test3.php" method="POST">
              <div class="form-row">
                <div class="form-group row col-md-6">
                  <label for="agefrom">Age From:</label>
                  <div class="col-sm-9">
                    <select name = 'agefrom' class="form-control">
                      <option>Default select</option>
                      <option value="20">20</option>
                      <option value="30">30</option>
                      <option value="40">40</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row col-md-6">
                  <label for="ageto">Age To:</label>
                  <div class="col-sm-9">
                    <select name="ageto" class="form-control">
                      <option>Default select</option>
                      <option value="50">50</option>
                      <option value="60">60</option>
                      <option value="70">70</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group row col-md-6">
                  <label for="division">Division:</label>
                  <div class="col-sm-9" style="margin-left: 13px;">
                    <select name="division" class="form-control">
                      <option>Default select</option>
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
                      <option>Default select</option>
                      <option value="gazipur">gazipur</option>
                      <option value="munshigongj">munshigonj</option>
                      <option value="dhaka">Dhaka</option>
                      <option value="khulna">Khulna</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group row col-md-6">
                  <label for="role">Role:</label>
                  <div class="col-sm-9" style="margin-left: 38px; ">
                    <select name="role" class="form-control">
                      <option>Default select</option>
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
              <div class = "header">
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
            

            if(isset($_POST['search'])){
                $agefrom = $_POST["agefrom"];
                $ageto = $_POST["ageto"];
                $division = $_POST["division"];
                $district = $_POST["district"];
                $role =$_POST["role"];

                if($division != ""){
                    $sql = "SELECT person.PersonName, person.NID, division.DivisionName,
                            district.DistrictName, fighter.Age, fighter.Role FROM fighter 
                            INNER JOIN person ON fighter.PersonID = person.PersonID 
                            INNER JOIN district ON person.DistrictID = district.DistrictID 
                            INNER JOIN division ON district.DivisionID = division.DivisionID WHERE DivisionName = '$division' AND DistrictName = '$district'";

                    $result = $conn->query($sql);
                    if($result->num_rows > 0)
                    {
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
                    }
                }

                elseif($division != "" and $district != ""){
                    $sql = "SELECT person.PersonName, person.NID, division.DivisionName,
                            district.DistrictName, fighter.Age, fighter.Role FROM fighter 
                            INNER JOIN person ON fighter.PersonID = person.PersonID 
                            INNER JOIN district ON person.DistrictID = district.DistrictID 
                            INNER JOIN division ON district.DivisionID = division.DivisionID WHERE DivisionName = '$division' AND DistrictName = '$district'";

                    $result = $conn->query($sql);
                    if($result->num_rows > 0)
                    {
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
                    }
                }
                elseif($agefrom != "" || $ageto != "" || $division != "" || $district != "" || $role != "")
                {
                    $sql = "SELECT person.PersonName, person.NID, division.DivisionName,
                            district.DistrictName, fighter.Age, fighter.Role FROM fighter 
                            INNER JOIN person ON fighter.PersonID = person.PersonID 
                            INNER JOIN district ON person.DistrictID = district.DistrictID 
                            INNER JOIN division ON district.DivisionID = division.DivisionID WHERE DivisionName = '$division' OR DistrictName = '$district' OR Role = '$role'";

                    $result = $conn->query($sql);
                    if($result->num_rows > 0)
                    {
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
                    }
                }
                else{
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
        
      </div>
      </div>
      
 
<!--
 WHEHE DivisionName = $division OR DistrictName = $district OR Role = $role OR Age BETWEEN $agefrom AND $ageto
  -->
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    

</body>
</html>