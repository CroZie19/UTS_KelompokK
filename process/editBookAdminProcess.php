<?php
    if(isset($_POST['edit'])){

        include('../db.php');

        $id = $_POST['id_buku'];
        $nama_buku = $_POST['nama_buku'];
        $file_temp  = $_FILES['gambar_buku']['tmp_name'];
        $buku = $_FILES['gambar_buku']['name'];
        $jumlah_buku = $_POST['jumlah_buku'];
        move_uploaded_file($file_temp, '../gambar_buku/'.$buku);

        $query = mysqli_query($con,
            "UPDATE buku SET nama_buku = '$nama_buku', gambar_buku = '$buku', jumlah_buku = '$jumlah_buku' WHERE id_buku = '$id' ")
            or die(mysqli_error($con)); 
        if($query){
            echo
                '<script>
                alert("Edit Book Admin Success");
                window.location = "../page/listBookAdminPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Book Admin Failed");
                </script>';
        }

    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }

?>