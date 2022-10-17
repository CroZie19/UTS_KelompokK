<?php
    session_start();
    if(isset($_GET['id'])){
        include ('../db.php');
        $id = $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM kunjung WHERE id='$id'") or die(mysqli_error($con));
        $data = mysqli_fetch_assoc($query);
        $id_kunjung = $data['id'];
        $query = mysqli_query($con, "UPDATE kunjung SET status='1' WHERE id='$id_kunjung'") or die(mysqli_error($con));
        if($query){
            echo
            '<script>
            alert("Kunjungan Disetujui"); window.location = "../page/listVisitPage.php"
            </script>';
        }else{
            echo
                '<script>
                alert("Kunjungan Failed"); window.location = "../page/listVisitPage.php"
                </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>