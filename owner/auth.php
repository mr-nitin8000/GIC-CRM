<?php 
session_start();
include 'conn.php';
// include 'db.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	}else if (empty($password)){
		header("Location: login.php?error=Password is required&email=$email");
	}else {
		$stmt = $conn->prepare("SELECT * FROM owner_user WHERE o_status = 1 and o_email=?");
		$stmt->execute([$email]);

		if ($stmt->rowCount() ===1) {
			$owner = $stmt->fetch();

			$owner_id = $owner['o_id'];
			$owner_email = $owner['o_email'];
			$owner_password = $owner['o_password'];
			$owner_full_name = $owner['o_name'];
			$owner_phone = $owner['o_phone'];
			// $owner_op_a = $owner['op_a'];
			// $owner_op_ina = $owner['op_ina']; 
			
			if ($email === $owner_email) {
				if (password_verify($password, $owner_password)) {
				// if ($password === $user_password) {
					$_SESSION['owner_id'] = $owner_id;
					$_SESSION['owner_email'] = $owner_email;
					$_SESSION['owner_full_name'] = $owner_full_name;
					$_SESSION['owner_phone'] = $owner_phone;
					header("Location: index.php");

				}else {
					
					header("Location: login.php?error=Incorrect User $password $user_password name or password&email=$email");
}
}else {
header("Location: login.php?error=Incorrect User name or password&email=$email");
}
}else {
header("Location: login.php?error=Incorrect User name or password&email=$email");
}
}
}