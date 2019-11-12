<?php
include'Database.php';
if(isset($_GET['delid'])){
// retrieve id from url
$id = $_GET['delid'];
//image delete
$db = new Database();
$getquery ="SELECT * FROM post where id = '$id' ";
	$get = $db->select($getquery);
	if($get){
	while ($getimage = $get->fetch_assoc()) {
	$dellink = $getimage['image'];
	unlink($dellink);
	}
	}
// sql delete query
$query = "DELETE FROM post WHERE id =". $id;
$del = $db->delete($query);
if ($del){
header("Location:viewPost.php");
echo "<span class='success'>Post Deleted Successfully !!</span>";
}else {
echo "<span class='error'>Something wrong !</span>";
}
}else{
	 echo "<script>window.location ='viewPost.php';</script>";
}
?>