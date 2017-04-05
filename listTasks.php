<?php

// Includs database connection
include "db_connection.php";

// Makes query with rowid
$query = "SELECT  ID, * FROM TASK";

// Run the query and set query result in $result
// Here $db comes from "db_connection.php"
$result = $db->query($query);

?>
<head>
	<title>Data List</title>
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
   background-color: #D6DBDF;
}
table.names th {
    background-color: black;
    color: white
}

.trhead {
    background-color: #239B56;
     color: white
}


</style>
</head>
<body>
	<div style="width: 1000px; margin: 20px auto;">
		<h1>Task Management System</h1>
		<table class="names" width="100%" cellpadding="" cellspacing="1" border="1">
			<tr class="trhead">
				<td class="trhead" width=200>Task Name</td>
				<td class="trhead" width=90>Created Date</td>
				<td class="trhead" width=200>Created By</td>
				<td class="trhead" width=200>Assinged To</td>
				<td class="trhead" width=80>Due Date</td>
				<td class="trhead" width=150>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['NAME'];?></td>
				<td><?php echo $row['CREATED_DATE'];?></td>
				<td><?php echo $row['CREATED_BY'];?></td>
				<td><?php echo $row['ASSIGNED_TO'];?></td>
				<td><?php echo $row['DUE_DATE'];?></td>
				<td>
					<a href="updateTask.php?id=<?php echo $row['ID'];?>"><button type="button">Edit</button></a>
					<a href="deleteTask.php?id=<?php echo $row['ID'];?>"confirm('Are you sure?');" ><button type="button">Delete</button></a>
				</td>
			</tr>
			<?php } ?>
		</table>
		
		<br/>
		<a href="insertTask.php"><button type="button">Add New</button></a>
	</div>
</body>