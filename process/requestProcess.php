<?php

if(isset($_POST['request'])){

    include('../db.php');

    $nama = $_POST['nama'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];

    $query = mysqli_query($con,
        "INSERT INTO request(nama_buku, penulis, tahun_rilis)
            VALUES
        ('$nama', '$penulis', '$tahun')")
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