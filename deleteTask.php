<?php

// Includs database connection
include "db_connection.php";

$id = $_GET['id']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM TASK WHERE rowid=$id";

// Run the query to delete record
if( $db->query($query) ){
	$message = "<font color='green'>Record is deleted successfully.\n";
}else {
	$message = "<font color='red'>Sorry, Record is not deleted.\n";
}

echo $message;
?>
<a href="listTasks.php">Back to List</a>