<?php
    // ini buat ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['login'])){
        include('../db.php'); // untuk mengoneksikan dengan databas dengan memanggil file db.php
    //tampung nilai yang ada di from ke variable
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Melakukan insert ke databse dengan query dibawah ini
    $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or
die(mysqli_error($con));
    // ini buat ngecek kalo misalnya hasil dari querynya == 0 ato ga ketemu -> emailnya tdk ditemukan
    if(mysqli_num_rows($query) == 0){
        echo
        '<script>
            alert("Email not found!"); window.location = "../index.php"
        </script>';
    }else{
        $users = mysqli_fetch_assoc($query);
        if ($email == 'admin'){
            if($password == $users['password']){
                session_start();
                $_SESSION['isLogin'] = true;
                $_SESSION['users'] = $users;
                echo
                '<script>
                    alert("Login Success"); window.location = "../page/listBookAdminPage.php"
                </script>';
            }else {
                echo
                    '<script>
                        alert("Email or Password Invalid");
                        window.location = "../page/loginPage.php"
                    </script>';
            }
        }else{
            if(password_verify($password, $users['password'])){
                session_start();
                $_SESSION['isLogin'] = true;
                $_SESSION['users'] = $users;
                echo
                '<script>
                    alert("Login Success"); window.location = "../page/dashboardUserPage.php"
                </script>';
            }else {
                echo
                '<script>
                    alert("Email or Password Invalid"); window.location = "../index.php"
                </script>';
            }
        }
    }
}else{
    echo
    '<script>
    window.history.back()
    </script>';
}
?>