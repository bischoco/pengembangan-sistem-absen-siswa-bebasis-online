<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/auth.css">
</head>

<body>   
    <?php session_start() ?>
<div class="container">
    <div class="form_area">
        <p class="title">Daftar</p>
        <p class="">
        <?php if (isset($_SESSION['error'])) { ?>
        <?php echo $_SESSION["error"] ?>
        <?php unset($_SESSION["error"]) ?>
        <?php } ?>
        </p>
        <form action="check-auth/check-daftar.php" method="post">
            <div class="form_group">
                <label class="sub_title" for="nama">Nama</label>
                <input placeholder="Masukan nama kamu" class="form_style" name="nama" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="password">Password</label>
                <input placeholder="Masukan password kamu" name="password" id="password" class="form_style" type="password">
            </div>
            <div class="form_group" id="input-kelas" >
               <label class="sub_title" for="kelas">Kelas</label>
               <select name="kelas" id="kelas" class="form_style">
                  <option value="" selected>masukan kelas kamu</option>
                  <option value="10 DKV 1">10 DKV 1</option>
                  <option value="10 DKV 2">10 DKV 2</option>
                  <option value="10 PH 1">10 PH 1</option>
                  <option value="10 PH 2">10 PH 2</option>
                  <option value="10 PH 3">10 PH 3</option>
                  <option value="11 DKV 1">11 DKV 1</option>
                  <option value="11 DKV 2">11 DKV 2</option>
                  <option value="11 DKV 3">11 DKV 3</option>
                  <option value="11 PH 1">11 PH 1</option>
                  <option value="11 PH 2">11 PH 2</option>
                  <option value="11 PH 3">11 PH 3</option>
                  <option value="11 PH 4">11 PH 4</option>
                  <option value="12 DKV 1">12 DKV 1</option>
                  <option value="12 DKV 2">12 DKV 2</option>
                  <option value="12 PH 2">12 PH 1</option>
               </select> 
               </div>
            <div class="form_group">
               <label class="sub_title" for="role">Role</label>
               <select name="role" id="role" class="sub_title">
                  <option value="siswa" selected>siswa</option>
                  <option value="guru">guru</option>
               </select> 
               </div>
            <div>
                <button class="btn" type="submit">Daftar</button>
                <p>Sudah memiliki akun? <a class="link" href="login.php">Login!</a></p>
            </div>
        
    </a></form>
    <script>
           const role = document.getElementById('role');
  const kelasField = document.getElementById('input-kelas');
  role.addEventListener('change', function(){
   if(this.value === 'siswa') {
    kelasField.style.display = "block"
   } else {
    kelasField.style.display = "none"
   }
  })
    </script>
</body>
</html>