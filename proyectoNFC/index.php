<?php
	require_once "modulos/header.php";
?>

<?php 

	//require_once "modulos/login.php";
if (!isset($_GET['page'])) {
	include ('modulos/body.php');
}else{
	if($_GET['page'] == "index"){
		include ('modulos/body.php');
		//echo "pasa";
	}else{
		include ('modulos/'.$_GET['page'].'.php');
	}
	
}

?>
<?php
	require_once "modulos/footer.php";
?>