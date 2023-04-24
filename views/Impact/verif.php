<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->

<?php
session_start();
include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

$msg = "";

if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $code = $_POST['code'];
   var_dump($_POST);
   $db = config::getConnexion();
   $stmt = $db->prepare("SELECT idclient, verif, code FROM user WHERE email = ?");
   $stmt->execute([$email]);

   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   if ($row && isset($row['code']) && $code == $row['code']) {           
    $sql = "UPDATE user SET verif=1 WHERE email=:email";
    $req = $db->prepare($sql);
    $req->bindParam(":email", $email);
    $req->execute();

      $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
   } else {
      $msg = "<div class='alert alert-danger'>Email or verification code do not match.</div>";
   }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form - Brave Coder</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <style>
html {
    scroll-behavior: smooth;
}

body,
html {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

* {
    box-sizing: border-box;
}

.d-grid {
    display: grid;
}

.d-flex {
    display: flex;
    display: -webkit-flex;
}

.text-center {
    text-align: center;
}

.text-left {
    text-align: left;
}

.text-right {
    text-align: right;
}

button,
input,
select {
    -webkit-appearance: none;
    outline: none;
    font-family: 'Poppins', sans-serif;
}

button,
.btn,
select {
    cursor: pointer;
}

a {
    text-decoration: none;
}

img {
    max-width: 100%;
}

ul {
    margin: 0;
    padding: 0
}

h1,
h2,
h3,
h4,
h5,
h6,
p {
    margin: 0;
    padding: 0
}

p {
    color: #666;
    font-size: 16px;
    line-height: 25px;
    opacity: .6;
}

.p-relative {
    position: relative;
}

.p-absolute {
    position: absolute;
}

.p-fixed {
    position: fixed;
}

.p-sticky {
    position: sticky;
}

.btn,
button,
.actionbg,
input {
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    -ms-border-radius: 4px;
}

.btn:hover,
button:hover {
    transition: 0.5s ease;
    -webkit-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
}

/*-- wrapper start --*/
.wrapper {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

@media (min-width: 576px) {
    .wrapper {
        max-width: 540px;
    }
}

@media (min-width: 768px) {
    .wrapper {
        max-width: 720px;
    }
}

@media (min-width: 992px) {
    .wrapper {
        max-width: 960px;
    }
}

@media (min-width: 1200px) {
    .wrapper {
        max-width: 1140px;
    }
}

.wrapper-full {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

/*-- //wrapper start --*/

/*-- form styling --*/
.w3l-mockup-form {
    position: relative;
    min-height: 100vh;
    z-index: 0;
    background: rgba(99, 194, 110, 0.1);
    padding: 40px 40px;
}

.container {
    max-width: 890px;
    margin: 0 auto;
}

.w3l_form {
    padding: 0px;
    flex-basis: 50%;
    -webkit-flex-basis: 50%;
    background: #00c16e;
    padding: 100px 50px;
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.content-wthree {
    flex-basis: 60%;
    -webkit-flex-basis: 60%;
    box-sizing: border-box;
    padding: 3em 3.5em;
    background: #fff;
    box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.1);
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
}

.w3l-workinghny-form .logo {
    text-align: center;
}

.w3l-mockup-form .main-mockup {
    position: relative;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    margin: 40px 0;
}

.w3l-mockup-form .alert-close {
    cursor: pointer;
    height: 35px;
    width: 35px;
    line-height: 35px;
    position: absolute;
    right: -5px;
    top: -5px;
    background: #62c16e;
    border-radius: 50px;
    color: #fff;
    text-align: center;
}

.w3l-mockup-form form {
    margin-top: 30px;
    margin-bottom: 30px;
}

.social-icons {
    text-align: center;
}

.w3l-mockup-form h1 {
    text-align: center;
    font-size: 40px;
    font-weight: 500;
    color: #3b3663;
}

.w3l-mockup-form h2 {
    display: inline-block;
    font-size: 25px;
    line-height: 35px;
    margin-bottom: 5px;
    font-weight: 600;
    color: #3b3663;
}

.w3l-mockup-form input {
    outline: none;
    margin-bottom: 15px;
    font-size: 16px;
    color: #999;
    text-align: left;
    padding: 14px 20px;
    width: 100%;
    display: inline-block;
    box-sizing: border-box;
    border: none;
    outline: none;
    background: transparent;
    border: 1px solid #e5e5e5;
    transition: 0.3s all ease;
}

.w3l-mockup-form input:focus {
    border-color: #00c16e;
}

.w3l-mockup-form button {
    font-size: 18px;
    color: #fff;
    width: 100%;
    background: #00c16e;
    border: none;
    padding: 14px 15px;
    font-weight: 500;
    transition: .3s ease;
    -webkit-transition: .3s ease;
    -moz-transition: .3s ease;
    -ms-transition: .3s ease;
    -o-transition: .3s ease;
}

.w3l-mockup-form button:hover {
    background: #4ca356;
}

.w3l-mockup-form .social-icons ul li {
    list-style: none;
    display: inline-block;
}

.w3l-mockup-form .social-icons ul li a {
    padding: 8px;
}

.w3l-mockup-form .social-icons ul li a:hover {
    opacity: 0.8;
    transition: 0.5s ease;
    -webkit-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
}

.w3l-mockup-form .social-icons ul span.fa {
    color: #696687;
    font-size: 18px;
    opacity: .8;
}

.w3l-mockup-form .social-icons ul li a.facebook span {
    color: #3b5998;
}

.w3l-mockup-form .social-icons ul li a.twitter span {
    color: #1da1f2;
}

.w3l-mockup-form .social-icons ul li a.pinterest span {
    color: #e60023;
}


.copyright p {
    text-align: center;
    font-size: 17px;
    line-height: 26px;
    color: #607863;
    opacity: 1;
}

p.copy-footer-29 a {
    color: #517856;
}

p.copy-footer-29 a:hover {
    color: #00c16e;
    transition: 0.5s ease;
    -webkit-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
}

.alert {    
    padding: 1rem;
    border-radius: 5px;
    color: white;
    margin: 1rem 0;
}

.alert-success {
    background-color: #42ba96;
}

.alert-danger {
    background-color: #fc5555;
}

.alert-info {
    background-color: #2E9AFE;
}

.alert-warning {
    background-color: #ff9966;
}

/*-- responsive design --*/

@media (max-width:736px) {
    .w3l-mockup-form .main-mockup {
        flex-direction: column;
    }

    .w3l_form {
        order: 2;
        padding: 50px;
        border-radius: 0;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .content-wthree {
        order: 1;
        border-radius: 0;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
}

@media (max-width:568px) {
    .w3l-mockup-form h1 {
        font-size: 30px;
    }

    .w3l-mockup-form .main-mockup {
        margin: 30px 0;
    }

    .content-wthree {
        padding: 2.5em;
    }
}

@media (max-width: 415px) {
    .w3l-mockup-form {
        padding: 40px 30px;
    }

}

@media (max-width:384px) {
    .w3l-mockup-form {
        padding: 30px 15px;
    }

    .content-wthree {
        padding: 2em;
    }

    .w3l-mockup-form h1 {
        font-size: 28px;
    }

    .w3l-mockup-form h2 {
        font-size: 22px;
        line-height: 32px;
    }

    .copyright p {
        font-size: 16px;
    }
}

/*-- //responsive design --*/
/*-- //form styling --*/


</style>
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
      
        <button class="btn" type="submit" onclick="window.location.href='login.php';">Go back to Home</button>


            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="C:\xampp\htdocs\tojrab03\views\Impact\assets\img\image.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>verification-   Vitalia</h2>
                        <p>Please check your email for verification code </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="text" name="code" placeholder="Enter Your code" style="margin-bottom: 2px;" required>
                            <button name="submit" name="submit" class="btn" type="submit">verification for your account</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>