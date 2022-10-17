<?php
    session_start();
    if(isset($_GET['id'])){
        include ('../db.php');
        $id = $_GET['id'];

        $queryDelete = mysqli_query($con, "DELETE FROM peminjaman WHERE id='$id'") or die(mysqli_error($con));

        if($queryDelete){
            echo
            '<script>
            alert("Peminjaman Berhasil Dihapus"); window.location = "../page/listPeminjamanPage.php"
            </script>';
        }else{
            echo
                '<script>
                alert("Hapus Failed"); window.location = "../page/listPeminjamanPage.php"
                </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>