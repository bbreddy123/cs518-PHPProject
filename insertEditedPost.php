<?php
	//<!-- retreive the comment on the post and insert it into the post table-->
	session_start();
	require_once('config.php');
?>
<?php
	
	$postEdited=$_POST['commentEdited'];
	
	$date  = date("Y/m/d H:i:s");
	$postid= $_SESSION['post_id'];
	
	//echo "gfhgdgg".$_SESSION['$del_flag'];
	
	if($_SESSION['$del_flag']==0)
	{
		if (!empty($_POST['commentEdited']))
		{
				$query  ="UPDATE
							P3_posts
						SET 
							post_content='$postEdited',
							modify_date='$date'
						WHERE 
						post_id='$postid'";
				$result = mysql_query($query) or die ("Unable to verify user because " . mysql_error());
				header("Location: extractPost.php");
		} 
		else 
		{
		?>
			<script type="text/javascript">
				alert("post cannot be empty");
				history.back();
			</script>
		<?php
		}

	}
	else
	{
		?>
			<script type="text/javascript">
				alert("post cannot be edited");
				history.back();
			</script>
		<?php
		
	}
	
 ?>
 
