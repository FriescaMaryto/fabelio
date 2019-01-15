<?php
include('config.php');
$koneksi = koneksi_db();

if (isset($_POST['submit'])) {
      $id=$_POST['id_p'];
			$title=$_POST['title'];
			$comment=$_POST['comment'];

			$save=mysql_query("INSERT INTO comment (title, comment, date_added, score, id_p) VALUES ('$title', '$comment', curdate(), 0, '$id')");

			header("Location:store.php?id_p=$id");
			exit();
	}

function score(){
    $id=$_POST['id'];

	$save=mysql_query("update comment set score=1 WHERE id='$id'");

}


?>

<!--redirect ke halaman sebelumnya-->
<!-- <script language="javascript">
  self.history.back()
</script> -->
