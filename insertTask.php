<?php
$message = "";
$message1 = "";
if( isset($_POST['submit_data']) ){
	// Includs database connection
	include "db_connection.php";

	// Gets the data from post
	//$id= $_POST['ID'];
	$name = $_POST['NAME'];
	$created_date = $_POST['CREATED_DATE'];
	$created_by = $_POST['CREATED_BY'];
	$assigned_to = $_POST['ASSIGNED_TO'];
	$due_date = $_POST['DUE_DATE'];
	

	// Makes query with post data
	if($name && $created_date && $created_by && $assigned_to && $due_date){
	$query = "INSERT INTO TASK (NAME, CREATED_DATE, CREATED_BY, ASSIGNED_TO, DUE_DATE) VALUES ( '$name', '$created_date', '$created_by', '$assigned_to', '$due_date')";
	if( $db->exec($query) ){
		$message ="<br><font color='green'>Data inserted successfully.";
	}else{
		$message = "<br><font color='red'>Sorry, Data is not inserted.";
	}
	
	}
	else{
		$message1 = "<br><font color='red'>Data required for all fields";
	}
	// Executes the query
	// If data inserted then set success message otherwise set error message
	
}
?>
<head>
	<title>Insert Data</title>
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
			<form action="insertTask.php" method="post">
			
			<tr>
				<td>Task Name:</td>
				<td><input name="NAME" type="text" value="<?php if( isset($_POST['submit_data'])) echo $name ?>"></td>
			<tr>
				<td>Created Date:</td>
				<td><input name="CREATED_DATE" type="date" value="<?php if( isset($_POST['submit_data'])) echo $created_date ?>" ></td>
			</tr>
			<tr>
				<td>Created By:</td>
				<td><input name="CREATED_BY" type="text" value="<?php if( isset($_POST['submit_data'])) echo $created_by ?>"> </td>
			</tr>
			<tr>
				<td>Assigned To:</td>
				<td><input name="ASSIGNED_TO" type="text" value="<?php if( isset($_POST['submit_data'])) echo $assigned_to ?>"> </td>
			</tr>
			<tr>
				<td>Due Date:</td>
				<td><input name="DUE_DATE" type="date" value="<?php if( isset($_POST['submit_data'])  ) echo $due_date ?>"> </td>
			</tr>
			<tr>
				<td><a href="listTasks.php"><button type="button">View Data</button></a></td>
				<td><input name="submit_data" type="submit" value="Insert Data"></td>
			</tr>
			</form>
		</table>
		<div><?php echo $message;?></div>
		<div><?php echo $message1;?></div>
	</div>
</body>