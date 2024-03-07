<?php 
session_start();
include 'db_conn.php';
// include 'db.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	}else if (empty($password)){
		header("Location: login.php?error=Password is required&email=$email");
	}else {
		$stmt = $conn->prepare("SELECT * FROM users WHERE status = 1 and email=?");
		$stmt->execute([$email]);

		if ($stmt->rowCount() ===1) {
			$user = $stmt->fetch();

			$user_id = $user['id'];
			$user_email = $user['email'];
			$user_password = $user['password'];
			$user_full_name = $user['full_name'];
			$user_phone = $user['phone'];
			$user_op_a = $user['op_a'];
			$user_op_ina = $user['op_ina'];
			$user_location = $user['location'];
			$user_car_p = $user['car_p'];
			$user_activa_p = $user['activa_p'];
			$user_bike_p = $user['bike_p'];
			
			if ($email === $user_email) {
				if (password_verify($password, $user_password)) {
				// if ($password === $user_password) {
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['user_full_name'] = $user_full_name;
					$_SESSION['user_phone'] = $user_phone;
					$_SESSION['user_op_a'] = $user_op_a;
					$_SESSION['user_op_ina'] = $user_op_ina;
					$_SESSION['user_location'] = $user_location;
					$_SESSION['user_activa_p'] = $user_activa_p;
					$_SESSION['user_bike_p'] = $user_bike_p;
					$_SESSION['user_car_p'] = $user_car_p;
					header("Location: index.php");

				}else {
					
					header("Location: login.php?error=Incorrect Username or password&email=$email");
}
}else {
header("Location: login.php?error=Incorrect User name or password&email=$email");
}
}else {
header("Location: login.php?error=Incorrect User name or password&email=$email");
}
}
}