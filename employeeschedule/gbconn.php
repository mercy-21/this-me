<?php
    session_start();
	$db = mysqli_connect('localhost', 'root', '', 'sampleproject');

	// initialize variables
	$name = "";
	$status = "";
	$id = 0;
	$edit_state = false;

	if (isset($_POST['add'])) {
		$name = $_POST['name'];
		$status = $_POST['status'];

		mysqli_query($db, "INSERT INTO goalbusters (name, status) VALUES ('$name', '$status')"); 
		$_SESSION['message'] = "Employee has been added"; 
		header('location: goalbusters.php');
	}
    if (isset($_POST['update'])) {
        $name = ($_POST['name']);
        $status = ($_POST['status']);
        $id = ($_POST['id']);

		mysqli_query($db, "UPDATE goalbusters SET name = '$name' , status = '$status' WHERE id = '$id'");
		$_SESSION['message'] = "Modifications have been saved";
		header('location: goalbusters.php');
	}
	if (isset($_GET['del'])) {
		$id = $_GET['del'];

		mysqli_query($db, "DELETE FROM goalbusters WHERE id = '$id'");
		$_SESSION['message'] = "Record has been deleted";
		header('location: goalbusters.php');
	}
    $results = mysqli_query($db, 'SELECT * FROM goalbusters');
?>