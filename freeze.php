<?php
session_start();

require_once('config.php');

	$freeze_thread=$_POST['thread'];
	$freeze_value = $_POST['freeze'];	
	
	$query1 ="UPDATE
					P3_thread 
			  SET
				freeze='$freeze_value' 
			  where 
				thread_id=$freeze_thread";
	$result1 = mysql_query($query1) or die ("Unable to verify user because " . mysql_error());
	
	$query2 ="SELECT 
				* 
			  FROM 
			   P3_thread
     		  WHERE 
				thread_id=$freeze_thread";
    $result2= mysql_query($query2) or die ("Unable to verify user because " . mysql_error());
    $row2 = mysql_fetch_assoc($result2);
	
	$_SESSION['freeze']= $row2['freeze'];
	$f=$_SESSION['freeze'];
	
	header("Location: showCategory.php");
?>