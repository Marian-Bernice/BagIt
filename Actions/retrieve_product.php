<?php  
//connect to the product controller
require(dirname(__FILE__).'/../Controllers/product_controller.php');

if (isset($_GET['id'])){
	//get item to archive
	$id = $_GET['id'];

	$archive = retrieve_fxn($id);

	if($archive){
		$delete = delete_archive_fxn($id);

		if($delete){
			header('location: ../View/archived.php');
		}
	}else echo "Retrieve failed";


}
