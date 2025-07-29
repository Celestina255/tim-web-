<?php
include '../koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <title>Login - Kampung Banjar Ausoy</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet">
   <style>
      body {
         background-color: #f1f1f1;
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      .login-wrapper {
         padding: 80px 0;
      }

      .login-box {
         background-color: #fff;
         padding: 40px 30px;
         border-radius: 10px;
         box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      }

      .login-title {
         font-size: 24px;
         font-weight: bold;
         margin-bottom: 30px;
         text-align: center;
      }

      .login-input {
         width: 100%;
         padding: 12px 15px;
         border: 1px solid #ccc;
         border-radius: 6px;
         margin-bottom: 20px;
         font-size: 16px;
      }

      .login-footer {
         text-align: center;
         margin-top: 20px;
         font-size: 14px;
      }

      .login-footer a {
         color: red;
         text-decoration: none;
         font-weight: 500;
      }

      .login-button {
         width: 100%;
         padding: 10px;
         font-size: 16px;
         font-weight: 600;
         background-color: #28a745;
         border: none;
         color: white;
         border-radius: 6px;
         transition: 0.3s;
      }

      .login-button:hover {
         background-color: #218838;
      }
   </style>
</head>
<body>

   <section class="login-wrapper" style="margin-top: 50px;">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
               <div class="login-box">
                  <h3 class="login-title">Login</h3>
                  <form action="login_act.php" method="POST">
                     <input type="text" name="uname" class="login-input" placeholder="Username" required>
                     <input type="password" name="pass" class="login-input" placeholder="Password" required>
                     <button type="submit" class="login-button">
                        <i class="fa fa-paper-plane-o"></i> Login
                     </button>
                  </form>
                  <div class="login-footer">
                     Daftar klik <a href="?page=registrasi">disini</a>, /
                     Lupa Password klik <a href="?page=forgot">disini</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
