<?php include 'db.php'; ?>
<!doctype html>
<html>
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
      <h4>Report parameter</h4><br>
          <form style="margin-left: 20px;" action="index.php" method="POST">
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
                      <option value="barisal">Barisal</option>
                      <option value="chittagong">Chittagong</option>
                      <option value="dhaka">Dhaka</option>
                      <option value="khulna">Khulna</option>
                      <option value="mymensingh">Mymensingh</option>
                      <option value="rajshahi">Rajshahi</option>
                      <option value="rangpur">Rangpur</option>
                      <option value="sylhet">Sylhet</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row col-md-6">
                  <label for="district">District:</label>
                  <div class="col-sm-9">
                    <select name="district" class="form-control">
                      <option>Default select</option>
                      <option value="barisal">Barisal</option>
                      <option value="chittagong">Chittagong</option>
                      <option value="dhaka">Dhaka</option>
                      <option value="khulna">Khulna</option>
                      <option value="mymensingh">Mymensingh</option>
                      <option value="rajshahi">Rajshahi</option>
                      <option value="rangpur">Rangpur</option>
                      <option value="sylhet">Sylhet</option>
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
                      <option value="commander">Commander</option>
                      <option value="fighter">Fighter</option>
                    </select>
                  </div>
                </div>
              </div>
             <div style="margin-left: 450px;">
              <button type="submit" name="search" class="btn btn-primary">Search</button>
              <button type="submit" class="btn btn-primary">Print</button>
             </div> 
          </form>
          <hr>

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
            <tr>
              <td>$name</td>
              <td><?php echo "$nid"; ?></td>
              <td><?php echo $division; ?></td>
              <td><?php echo $district; ?></td>
              <td><?php echo $age; ?></td>
              <td><?php echo $role; ?></td>
            </tr>
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