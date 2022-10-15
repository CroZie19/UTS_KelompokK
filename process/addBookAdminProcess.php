<?php

if(isset($_POST['add'])){

    include('../db.php');

    $nama_buku = $_POST['nama_buku'];
    $file_temp  = $_FILES['gambar_buku']['tmp_name'];
    $buku = $_FILES['gambar_buku']['name'];
    $jumlah_buku = $_POST['jumlah_buku'];
    move_uploaded_file($file_temp, '../gambar_buku/'.$buku);

    $query = mysqli_query($con,
        "INSERT INTO buku(nama_buku, gambar_buku, jumlah_buku)
            VALUES
        ('$nama_buku', '$buku', '$jumlah_buku')")
            or die(mysqli_error($con)); 

    if($query){
        echo
            '<script>
            alert("Add Book Admin Success");
            window.location = "../page/listBookAdminPage.php"
            </script>';
    }else{
        echo
            '<script>
            alert("Add Book Admin Failed");
            </script>';
    }

}else{
    echo
        '<script>
        window.history.back()
        </script>';
}

?>