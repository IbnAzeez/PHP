<html>
	<head>
		<title>Contact form</title>
	</head>
	<body> 
		<h3>Contact Me</h3>
		<form action="Contact.php" method="POST">
			<p>
				<label for="first_name">First Name</label><br />
					<input type="text" name="first_name" placeholder="Enter Your First Name" />
			</p>
			<p>
				<label for="last_name">Last Name</label><br />
					<input type="text" name="last_name" placeholder="Enter Your Last Name" />
			</p>
			<p>
				<label for="email">Email</label><br />
					<input type="email" name="email" placeholder="Enter Your Email" required />
			</p>
            <p>
                <label for="department">Department</label><br />
					<select name="department">
						<option>Select Department</option>
						<option>HR</option>
						<option>Marketing</option>
						<option>Board </option>
						<option>Kitchen</option>
					</select>
            </p>
			<p>
				<label for="gender">Gender</label><br />
					<input type="radio" name="gender" /> Female 
                    <input type="radio" name="gender" /> Male
			</p>
			<p>
				<label for="email">Your Message</label><br />
					<textarea name="message" ></textarea>
			</p>
			<p>		
				<input type="checkbox" name="terms"  required /> By Checking this box you agree to our terms and conditions  
			</p>
			<button name="submit" type="submit">Send Message</button>
		</form>

<?php
/*if(isset($_POST['submit'])){
	$first_name = "First Name: ".$_POST['first_name']."";
	$last_name = "Last Name: ".$_POST['last_name']."";
	$email = "Email: ".$_POST['email']."";
	$department = "Department: ".$_POST['department']."";
	$gender = "Gender: ".$_POST['gender']."";
	$message = "Your Message: ".$_POST['message']."";

	$file = fopen("saved.txt", 'a') or die("Can't opem file");
	fwrite($file, $first_name);
	fwrite($file, $last_name);
	fwrite($file, $email);
	fwrite($file, $department);
	fwrite($file, $gender);
	fwrite($file, $message);
	fclose($file);
}*/

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
	</body>
</html>