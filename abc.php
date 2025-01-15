

<html>
<body align="center" >



<?php
// Azure SQL Database connection details
$server = "tahira-sql-server.database.windows.net"; // Azure SQL server name
$database = "test-database"; // Your database name
$username = "tahira"; // Your SQL server username
$password = "@bajwa123456789"; // Your SQL server password

// Create a connection
$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
	die("connection failed.". $conn->connect_error);
}

echo "database connected successfully."."<br>";
/*
$sql="CREATE TABLE formas(
    First_name varchar(255), Last_name varchar(255), Email_id varchar(255), Telephone_Number int, Website_url varchar(255), Select_department varchar(255),  File varchar(555), comments varchar(500)) ";
if($conn->query($sql) === TRUE)
{

	echo "<h2>TABLE</h2>table is created successfully."."<br>";
}
else
{

	echo" table is not created successfully.".$conn->error;
} 

*/

echo "<h2>Latest Registration</h2>";
$Fname=$_POST["First_name"];
echo "First_name is:".$Fname."<br>";

$F=$_POST["Email_id"];
echo "Email_id is:".$F."<br>";
$E=$_POST["Telephone_Number"];
echo "Telephone_Number is:".$E."<br>";



	


$R=$_POST["comments"];
echo "comments is:".$R."<br><br>";

$sql=" INSERT INTO formas(First_name,  Email_id, Telephone_Number, comments)
    VALUES( '$Fname' ,  '$F','$E','$R')";
if($conn->query($sql) === TRUE)
{

	echo "<h2>INSERT</h2>insert in table  successfully."."<br>";
}
else
{

	echo" insert in table is not  successfully.".$conn->error;
}

$sql="SELECT First_name,  Email_id, Telephone_Number, comments FROM formas";
$result = $conn->query($sql);

if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		echo"<br><h2>SELECT</h2><br>"."First_name: ".$row["First_name"]."<br>"."Email_id: ".$row["Email_id"]."<br>"."Telephone_Number:".$row["Telephone_Number"]."<br>"."comments:".$row["comments"]."<br><hr>";

	}
}
else
{
	echo "0 result";
}



/*

$sql="SELECT Firstname, lastname,  fathername, email,contact_no, DOB , qualification FROM form1";
$result = $conn->query($sql);

if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		echo"<br><h2>SELECT</h2><br>"."First_name: ".$row["Firstname"]."<br>"."Last_name:".$row["lastname"]."<br>"."Father_name: ".$row["fathername"]."<br>"."Email_id:".$row["email"]."<br>"."Contact_no:".$row["contact_no"]."<br>"."DOB:".$row["DOB"]."<br>"."Qualification:".$row["qualification"]."<br><hr>";

	}
}
else
{
	echo "0 result";
}


$sql=" INSERT INTO example(ID , Firstname, lastname, address)
    VALUES('1' , 'alizy' , 'bajwa', 'lahore')";
if($conn->query($sql) === TRUE)
{

	echo "<h2>INSERT</h2>insert in table  successfully."."<br>";
}
else
{

	echo" insert in table is not  successfully.".$conn->error;
}

$sql1="SELECT ID, Firstname, lastname, address FROM example";
$result = $conn->query($sql1);
if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		echo"<br><h2>SELECT</h2>"."ID: ".$row["ID"]."<br>"."First name".$row["Firstname"]."<br>"."Last name".$row["lastname"]."<br>"."Address".$row["address"]."<br><hr>";

	}
}
else
{
	echo "0 result";
}

$sql2="UPDATE example SET `ID`='6',`Firstname`='sairaaaa',`lastname`='Bajwa',`address`='lahore' WHERE `ID`='4'" ;
if($conn->query($sql2) === TRUE)
{

	echo "<h2>UPDATE</h2>Update in table  successfully."."<br>";
}
else
{

	echo" Update in table is not  successfully.".$conn->error;
}

$sql3="DELETE FROM example WHERE `ID` ='0' ";
if($conn->query($sql3) === TRUE)
{

	echo "<h2>DELETE</h2>delete in table  successfully."."<br>";
}
else
{

	echo" delete in table is not  successfully.".$conn->error;
}*/
$conn->close()

?>
</body>
</html>