<?php
    if(isset($_POST['edit'])){

        include('../db.php');

        $id = $_POST['id'];
        $nama_buku = $_POST['nama_buku'];
        $penulis = $_POST['penulis'];
        $tahun_rilis = $_POST['tahun_rilis'];

        $query = mysqli_query($con,
            "UPDATE request SET nama_buku = '$nama_buku', penulis = '$penulis', tahun_rilis = '$tahun_rilis' WHERE id = '$id' ")
            or die(mysqli_error($con)); 
        if($query){
            echo
                '<script>
                alert("Edit Reguest Buku Success");
                window.location = "../page/listRequestUserPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Reguest Buku Failed");
                </script>';
        }

    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }

?>