<?php
    session_start();
    if(isset($_GET['id'])){
        include ('../db.php');
        $id = $_GET['id'];
        $query = mysqli_query($con, "SELECT b.id_buku as id, b.jumlah_buku as jumlah FROM peminjaman p join buku b on (p.id_buku = b.id_buku) WHERE p.id='$id'") or die(mysqli_error($con));
        $data = mysqli_fetch_assoc($query);
        $id_buku = $data['id'];
        $jumlah = $data['jumlah'] + 1;
        mysqli_query($con, "UPDATE buku SET jumlah_buku='$jumlah' WHERE id_buku='$id_buku'") or die(mysqli_error($con));
        $queryUpdate1 = mysqli_query($con, "UPDATE peminjaman SET status='1' WHERE id='$id'") or die(mysqli_error($con));
        if($queryUpdate1){
            echo
            '<script>
            alert("Buku Berhasil Dikembalikan"); window.location = "../page/listPeminjamanPage.php"
            </script>';
        }else{
            echo
                '<script>
                alert("Pengembalian Failed"); window.location = "../page/listPeminjamanPage.php"
                </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>