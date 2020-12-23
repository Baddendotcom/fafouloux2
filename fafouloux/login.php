<?php
include ('config.php');
/* 
session_start();
$session_id = isset($_SESSION['id']) ? (int) $_SESSION['id'] : 0;
$session_nom = isset($_SESSION['nom']) ? htmlspecialchars($_SESSION['nom']) : '';


if (isset($_POST['login'])){


    if (isset($_POST['email']) AND isset($_POST['password'])){

        // recup data form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // connect db
        $sql = $db->prepare("SELECT id, email, password FROM users WHERE email = :email");
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->execute();
        $member = $sql->fetch();
        $sql->CloseCursor();

        // si les data n'existent pas
        if (!$member){
            header('location:login.php');
            exit();
        }
        // comparaison data
        if ($password != $member['password']){
            header('location:login.php');
            exit();
        }

        // si ok
        $_SESSION['id'] = $member['id'];
        $_SESSION['email'] = $member['email'];

        // ok
        header('location:index.php');


    }




}

*/





?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestionnaire retards</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-light">



<?php
if($session_id != 0) {

    header('location:index.php');

}else{
    echo '
    
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="/login.php" method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="email@exemple.com" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="****************" name="password">
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>
';
    }
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
