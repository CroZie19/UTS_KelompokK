<?php
session_start();
if (isset($_GET['id'])) {
    include('../db.php'); 
    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($con));
    $user = mysqli_fetch_assoc($query);
    $id_user = $user['id'];
    
    $id_buku = $_GET['id']; 
    $date = date('Y-m-d' ,strtotime("+7 days"));

    
    $query = mysqli_query($con,
            "INSERT INTO peminjaman(id_user, id_buku, tanggal_pengembalian, status)
            VALUES
            ('$id_user', '$id_buku', '$date', '0' )") or die(mysqli_error($con)); 
    if($query){
        $query2 = mysqli_query($con, "SELECT * FROM buku WHERE id_buku=$id_buku") or die(mysqli_error($con));
                $data = mysqli_fetch_assoc($query2);
                $jumlah = $data['jumlah_buku']-1;
        $query3 = mysqli_query($con, "UPDATE buku SET jumlah_buku ='$jumlah' WHERE id_buku = $id_buku") or die(mysqli_error($con)); 
        echo
        '<script>
        alert("Peminjaman Success"); window.location = "../page/dashboardUserPage.php"
        </script>';
    }else{
        echo
        '<script>
        alert("Peminjaman Failed"); window.location = "../page/dashboardUserPage.php"
        </script>';
    }
        
} else {
    echo
    '<script>
    window.history.back()
     </script>';
}
?>