<?php 
  session_start();

  if (!isset($_SESSION['owner_id']) && !isset($_SESSION['owner_email'])) { 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>InsureLink Owner Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh">
        <form class="p-5 rounded shadow" action="auth.php" method="post" style="width: 30rem">
            <h1 class="text-center pb-5 display-4">OWNER LOGIN</h1>
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?=htmlspecialchars($_GET['error'])?>
            </div>
            <?php } ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address
                </label>
                <input type="email" name="email"
                    value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>"
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password
                </label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" />
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
    </div>
    <!-- <div class="d-flex justify-content-center align-items-center" style="min-height: 40vh">
        Don't have any account? <a href="signup.php">Create account </a>
    </div> -->
</body>
<style>
body {
    background-color: black;
    color: rgb(131, 193, 247);
    background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
    height:100vh;
}
img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]
    {
      display: none !important;
    }
</style>
<!-- <link rel="stylesheet" href="style/star.css" /> -->

</html>

<?php 
}else {
   header("Location: index.php");
}
 ?>