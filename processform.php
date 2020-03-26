<?php 

//print_r($_POST);

if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['department']) && isset($_POST['gender']) && isset($_POST['terms']) && isset($_POST['message'])){
	$data = "First Name: ".$_POST['first_name'] . '    ' ."Last Name: ".$_POST['last_name'] . '    ' ."Email: ".$_POST['email'] . '    ' ."Department: ".$_POST['department'] . '    ' ."Gender: ".$_POST['gender'] . '    ' ."Terms: ".$_POST['terms'] . '    ' ."Your Message: ".$_POST['message'] ."\n";
	$filename = $_POST['first_name']." ".$_POST['last_name'].".txt";
	if (!file_exists($filename)) {
        $fh = fopen($filename, 'w') or die("Can't create file");
		fwrite($fh, $data);
		fclose($fh);
    }
	$ret = file_put_contents('$filename', $data, FILE_APPEND | LOCK_EX);
	if($ret === false) {
		die('There was an error writing this file');
	}
	else {
		echo "$ret bytes written to file successfully";
	}
}
else {
	die('no post data to process');
}
?>