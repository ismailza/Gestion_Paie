<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="login.css">
  <title>Admin Login</title>
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
  </style>
</head>

<body>
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
</body>

</html>