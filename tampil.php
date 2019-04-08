<?php
// Check for the path elements
// Turn off error reporting
error_reporting(0);
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Report all errors
error_reporting(E_ALL);
// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$con=mysqli_connect("localhost","id8390385_tugas3","fatimah","id8390385_tugas3");
// Check connection
if (mysqli_connect_errno())
	{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		
	$arr = array();

	$sql = "SELECT id,merk,jumlah,harga FROM tbl_masuk";
	$result = $con->query($sql);

	if ($result->num_rows > 0) 
		{
		// output data of each row
		while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Merk: " . $row["merk"]. " - Jumlah: " . $row["jumlah"]." - Harga: " . $row["harga"]. "<br>";
			$temp = array(
						"id" => $row["id"],
						"merk" =>$row["merk"],
						"jumlah" => $row["jumlah"],
						"harga" => $row["harga"]);
   
					array_push($arr, $temp);
		
		}
		} else {
		echo "0 results";
		}
		$data = json_encode($arr);	
		
	
	echo "<br>{\"MENAMPILKAN DATA USER dengan format JSON\":" . $data . "}<br><br><br>";
	}

	



?>
