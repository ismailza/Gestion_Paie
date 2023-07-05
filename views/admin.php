<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
if (isset($_SESSION['admin'])) {
    header("location: admin_home");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url() no-repeat;
            background-size: cover;
        }
        .login-box {
            width: 280px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #191970;
        }
        .login-box h1 {
            float: left;
            font-size: 40px;
            border-bottom: 4px solid #191970;
            margin-bottom: 50px;
            padding: 13px;
        }
        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #191970;
        }
        .fa {
            width: px;
            float: left;
            text-align: center;
        }
        .textbox input {
            border: none;
            outline: none;
            background: none;
            font-size: 18px;
            float: left;
            margin: 0 10px;
        }
        .button {
            width: 100%;
            padding: 8px;
            color: #ffffff;
            background: none #191970;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }
        .fh5co-loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(./loader.gif) center no-repeat #fff;
        }
    </style>
</head>
<body>
    <div class="fh5co-loader"></div>

    <?php if (isset($_SESSION['erreur'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
            <?php echo $_SESSION['erreur'] ?>
            <button type="button" class="btn" onclick="hide()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['session'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" align="center">
            <?php echo $_SESSION['session']; ?>
            <button type="button" class="btn" onclick="hide()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
    <?php endif ?>
    <form action="../scripts/adminConnect.php" method="post">
        <div class="login-box">
            <h1>Admin</h1>

            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="username" required>
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" required>
            </div>

            <input class="button" type="submit" name="login" value="Sign In">
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(".fh5co-loader").fadeOut("slow");

        function hide() {
            $('.alert').fadeOut(500);
        }
    </script>
</body>
</html>