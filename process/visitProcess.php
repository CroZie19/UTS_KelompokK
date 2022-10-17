<?php
    session_start();
    if(isset($_POST['visit'])){

        include('../db.php');

        $email = $_SESSION['email'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($con));
        $user = mysqli_fetch_assoc($query);
        $id_user = $user['id'];
        $nama = $_POST['nama'];
        $sesi = $_POST['sesi'];
        $tanggal = $_POST['tanggal'];

        $query = mysqli_query($con,
        "INSERT INTO kunjung(id_user, nama, sesi, tanggal, status) 
            VALUES
        ('$id_user', '$nama', '$sesi', '$tanggal', '0')")
            or die(mysqli_error($con));
            
        if($query){
            echo
                '<script>
                alert("Add Kunjungan Success"); 
                window.location = "../page/visitPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Add Kunjungan Failed");
                </script>';
        }  
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>