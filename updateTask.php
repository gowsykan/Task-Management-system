<?php
$message = ""; // initial message 
$message1 = ""; // initial message 

// Includs database connection
include "db_connection.php";

// Updating the table row with submited data according to ID once form is submited 

if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$name = $_POST['NAME'];
	$created_date = $_POST['CREATED_DATE'];
	$created_by = $_POST['CREATED_BY'];
	$assigned_to = $_POST['ASSIGNED_TO'];
	$due_date = $_POST['DUE_DATE'];

	// Makes query with post data
	if($name && $created_date && $created_by && $assigned_to && $due_date){
	$query = "UPDATE TASK set NAME='$name', CREATED_DATE='$created_date', CREATED_BY='$created_by', ASSIGNED_TO='$assigned_to', DUE_DATE='$due_date' WHERE ID=$id";
	if( $db->exec($query) ){
		$message = "<font color='green'>Data is updated successfully.";
	}else{
		$message = "<font color='red'>Sorry, Data is not updated.";
	}
	}
	else{
		$message1= "<font color='red'>UPDATE INCOMPLETE(YOU SHOULD GIVE ALL DETAILS)";
	}
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "db_connection.php"
	
}

$id = $_GET['id']; // rowid from url
// Prepar the query to get the row data with rowid
$query = "SELECT ID, * FROM TASK WHERE ID=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<head>
	<title>Update Data</title>
</head>
<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table.names tr:nth-child(even) {
    background-color: #fff;
}
table.names tr:nth-child(odd) {
   background-color: #696969;
}
table.names th {
    background-color: black;
    color: white
}
</style>
<body>
	<div style="width: 500px; margin: 20px auto;">
		<h1>Task Management System</h1>
		<!-- showing the message here-->
		

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr>
				<td>Task Name:</td>
				<td><input  size="45"name="NAME" type="text" value="<?php echo $data['NAME'];?>"></td>
			</tr>
			<tr>
				<td>Created Date:</td>
				<td><input name="CREATED_DATE" type="date" value="<?php echo $data['CREATED_DATE'];?>"></td>
			</tr>
			<tr>
				<td>Created By:</td>
				<td><input name="CREATED_BY" type="text" value="<?php echo $data['CREATED_BY'];?>"></td>
			</tr>
			<tr>
				<td>Assigned To:</td>
				<td><input name="ASSIGNED_TO" type="text" value="<?php echo $data['ASSIGNED_TO'];?>"></td>
			</tr>
			<tr>
				<td>Due Date:</td>
				<td><input name="DUE_DATE" type="date" value="<?php echo $data['DUE_DATE'];?>"></td>
			</tr>
			<tr>
				<td><a href="listTasks.php"><button type="button">Back</button></a></td>
				<td><input name="submit_data" type="submit" value="Update Data"></td>
			</tr>
			</form>
		</table>
		
		<Br/>
		<div><?php echo $message;?></div>
		<div><?php echo $message1;?></div>
	</div>
</body>