<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freedom_fighter";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("connection failed" . $conn->connect_error);
}
echo "connected successfully";


     
if(isset($_POST['search'])){
    $agefrom = $_POST["agefrom"];
    $ageto = $_POST["ageto"];
    $division = $_POST["division"];
    $district = $_POST["district"];
    $role =$_POST["role"];

    if($agefrom != "" || $ageto != "" || $division != "" || $district != "" || $role != "")
    {
        $sql = "SELECT person.PersonName, person.NID, division.DivisionName,
                district.DistrictName, fighter.Age, fighter.Role FROM fighter 
                INNER JOIN person ON fighter.PersonID = person.PersonID 
                INNER JOIN district ON person.DistrictID = district.DistrictID 
                INNER JOIN division ON district.DivisionID = division.DivisionID WHEHE DivisionName = $division OR DistrictName = $district OR Role = $role OR Age BETWEEN $agefrom AND $ageto;

                $result = $conn->query($sql);
                if($result->row_nums > 0)
                {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row[PersonName];
                        $nid = $row[NID];
                        $division = $row[DivisionName];
                        $district = $row[DistrictName];
                        $age = $row[Age];
                        $role = $row[Role];
                       
                        }
                    }
                    else{
                       echo "Row is not found"   
                    }
                }       
            }
           

?>