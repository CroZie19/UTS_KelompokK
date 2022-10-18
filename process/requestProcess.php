<?php
session_start();
if(isset($_POST['request'])){

    include('../db.php');

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($con));
    $user = mysqli_fetch_assoc($query);
    $id_user = $user['id'];
    $nama = $_POST['nama'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];

    $query = mysqli_query($con,
        "INSERT INTO request(id_user, nama_buku, penulis, tahun_rilis)
            VALUES
        ('$id_user','$nama', '$penulis', '$tahun')")
            or die(mysqli_error($con)); 

    if($query){
        echo
            '<script>
            alert("Request Success");
            window.location = "../page/listRequestUserPage.php"
            </script>';
    }else{
        echo
            '<script>
            alert("Request Success");
            </script>';
    }

}else{
    echo
        '<script>
        window.history.back()
        </script>';
}

?>