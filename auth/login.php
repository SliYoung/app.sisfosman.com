<?php  
    session_start();

    if ($_SESSION) {

    echo "<script>
         alert('Anda Telah Login')
         window.location='../index.php'
         </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login SIMPD</title>
  <link href="../assets/template-admin/img/logo/logo.png" rel="icon">
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <style>
    html, body {
      width: 100%;
      height:100%;
    }

    body {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .role-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin: 15px 0;
    }

    .role-buttons input[type="radio"] {
      display: none;
    }

    .role-buttons label {
      padding: 10px 20px;
      border: 2px solid white;
      border-radius: 25px;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 14px;
    }

    .role-buttons input[type="radio"]:checked + label {
      background-color: white;
      color: #333;
      font-weight: bold;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <header>SISFO SMA</header>
      <p style="color: white; font-size: 13px; margin: 10px 0px -30px 0px;">Silakan Masukkan Username dan Password</p>
      <form action="proses_login.php" method="post" onsubmit="return validateForm()">
        <div class="field email">
          <div class="input-area">
            <input type="text" placeholder="Username" name="username">
            <i class="icon fas fa-user"></i>
          </div>
        </div>
        <div class="field password">
          <div class="input-area">
            <input type="password" placeholder="Password" name="password">
            <i class="icon fas fa-lock"></i>
          </div>
        </div>
        <div class="role-buttons">
          <input type="radio" id="role-admin" name="role" value="admin">
          <label for="role-admin">Admin</label>

          <input type="radio" id="role-guru" name="role" value="guru">
          <label for="role-guru">Guru</label>

          <input type="radio" id="role-siswa" name="role" value="siswa">
          <label for="role-siswa">Siswa</label>
        </div>

        <input type="submit" name="login" value="Login" style="margin-top: 0px;">
      </form>
      <marquee behavior="alternate" direction="right" scrollamount="2" style="color: white; font-size: 13px; margin: 0px 0px -30px 0px;">Copyright &copy; <script> document.write(new Date().getFullYear()); </script> - Developed by <b>M.'s</b></marquee>
    </div>
  </div>
  <!-- jQuery (dibutuhkan oleh Toastr) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    function validateForm() {
      const roles = document.getElementsByName('role');
      let selected = false;

      for (let i = 0; i < roles.length; i++) {
        if (roles[i].checked) {
          selected = true;
          break;
        }
      }

      if (!selected) {
        toastr.options = {
          "closeButton": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "timeOut": "4000"
        };
        toastr.warning('Silakan pilih role Anda (Admin, Guru, atau Siswa)');
        return false; // Cegah form submit
      }
      return true; // Lanjut submit
    }
  </script>
</body>
</html>