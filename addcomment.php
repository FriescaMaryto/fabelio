<?php
include('config.php');
$koneksi = koneksi_db();

if (isset($_POST['submit'])) {
      $id=$_POST['id_p'];
			$title=$_POST['title'];
			$comment=$_POST['comment'];
			
			$query="INSERT INTO comment (title, comment, date_added, score, id_p) VALUES ('$title', '$comment', curdate(), 0, '$id')" or die(mysql_error());
			$action = mysql_query($query, $koneksi);

			header("Location:store.php?id_p=$id");
			exit();
	}
	
if($_GET['upvt']){
	scoreU($_GET['upvt'],$_GET['id']);
}

if($_GET['dnvt']){
	scoreD($_GET['dnvt'],$_GET['id']);
}

function scoreU($idu,$id){
	$query="update comment set score = score + 1 WHERE id='$idu'" or die(mysql_error());
	$action = mysql_query($query, $koneksi);
	header("Location:store.php?id_p=$id");
	exit();
}

function scoreD($idd,$id){
	$query="update comment set score = score + 1 WHERE id='$idu'" or die(mysql_error());
	$action = mysql_query($query, $koneksi);
	header("Location:store.php?id_p=$id");
	exit();
}


?>

<!--redirect ke halaman sebelumnya-->
<!-- <script language="javascript">
  self.history.back()
</script> -->
