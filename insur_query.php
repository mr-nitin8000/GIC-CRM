<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="query">
        <h3>Insurance Query Contact</h3>
        <form action="process-form.php" method="POST">
            <label for="insure">Type of insurance:</label>
            <select id="insure" name="insurance">
                <option value="Activa">Activa</option>
                <option value="Bike">Bike</option>
                <option value="Car">Car</option>
                <option value="truck">truck</option>
            </select>
            <label for="reg_no">Vehicle Number:</label>
            <input type="text" id="reg_no" name="reg_no" value="RJ-14-" required />

            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Write What you want"></textarea>

            <button type="submit" name="submit" href="#popup1">Enquiry</button>
        </form>
    </div>
    <nav class="mobile-bottom-nav">
        <div class="mobile-bottom-nav__item">
            <a href="polices.php" class="a-mobile-bottom-nav__item mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i><img src="img/insurance-icon.webp" alt="" height="20px" width="20px" /></i>
                    POLICIES
                </div>
            </a>
        </div>
        <div class="mobile-bottom-nav__item mobile-bottom-nav__item">
            <a href="index.php" class="a-mobile-bottom-nav__item mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i><img src="img/home.webp" alt="" height="20px" width="20px" /></i>
                    HOME
                </div>
            </a>
        </div>
        <div class="mobile-bottom-nav__item">
            <a href="profile.php" class="a-mobile-bottom-nav__item mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i><img src="img/profile-icon.webp" alt="" height="20px" width="20px" /></i>
                    PROFILE
                </div>
            </a>
        </div>
    </nav>
</body>

</html>

<style>
body {
    background-color: black;
    color: rgb(131, 193, 247);
    text-align: center;
    background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
}

.query {
    height: 70vh;
    padding-top: 20vh;
}

form {
    text-align: left;
    max-width: 500px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin: 10px;
}

select,
input[type="text"],
input[type="email"],
textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
    font-size: 16px;
    resize: vertical;
}

button[type="submit"] {
    background-color: #4050da;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #1fa1d4;
}
img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {

    display: none !important;

}
</style>