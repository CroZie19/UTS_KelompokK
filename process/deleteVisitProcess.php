<?php
    session_start();
    if(isset($_GET['id'])){
        include ('../db.php');
        $id = $_GET['id'];

        $queryDelete = mysqli_query($con, "DELETE FROM kunjung WHERE id='$id'") or die(mysqli_error($con));

        if($queryDelete){
            echo
            '<script>
            alert("Kunjungan Berhasil Dihapus"); window.location = "../page/listVisitPage.php"
            </script>';
        }else{
            echo
                '<script>
                alert("Hapus Failed"); window.location = "../page/listVisitPage.php"
                </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>