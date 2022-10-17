<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['edit'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        session_start();
    
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $file_temp  = $_FILES['foto']['tmp_name'];
        $users = $_FILES['foto']['name'];
        move_uploaded_file($file_temp, '../foto/'.$users);
        $username = $_POST['username'];      
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama = $_POST['nama'];

       $query = mysqli_query($con,"UPDATE users SET foto = '$users', username = '$username', password = '$password', email = '$email', nama = '$nama'
        WHERE id = ". $_SESSION['users']['id']."") or die(mysqli_error($con));

        if($query){
            $sql = mysqli_query($con, "SELECT * FROM users WHERE id=". $_SESSION['users']['id']."");
            $users = mysqli_fetch_assoc($sql);
            $_SESSION['users'] = $users;
        
            echo
                '<script>
                alert("Editing Success");
                window.location = "../page/profilePage.php"
                </script>';
        } else {
            echo
                '<script>
                alert("Editing Failed");
                windows.location = "../page/editProfilePage.php"
                </script>';
        }
    } else {
        echo
            '<script>
            alert("Editing Failed");
            window.history.back()
            </script>';
    }      

?>