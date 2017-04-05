<?php
class MyDB extends SQLite3
   {
      function __construct()
      {
		  $this->open('TASK_DB.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "\n";
   }

$query = "CREATE TABLE IF NOT EXISTS TASK(
   ID INT PRIMARY KEY  AUTOINCREMENT    NOT NULL,
   NAME           CHAR(150) NOT NULL,
	CREATED_DATE   datetime default current_timestamp,
	    CREATED_BY        TEXT ,
	 ASSIGNED_TO        TEXT,
	   DUE_DATE  datetime

);";


$db->exec($query);
?>