<?php
    include '../component/sidebar.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >

    <div class="body d-flex justify-content-between">
        <h4>List Buku Admin</h4>
        <h4>
            <a href="../page/addBookAdminPage.php?" style="color: #555747;" class="fa fa-plus"> Tambah Buku</a>
        </h4>
    </div>
    <hr>
        <thead>
            <div class="container">
                <div class="col-md-12">
                    <div class="col-md-8 mt-4">
                        <div class="col-md-12"> 
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM buku") or
die(mysqli_error($con));
                        if (mysqli_num_rows($query) == 0) {
                            echo '<tr> <td colspan="6"> Tidak ada data </td> </tr>';
                        }else{
                            while($data = mysqli_fetch_assoc($query)){
                        ?>

                        <div class="col-md-12 row mb-5">
                            <div class="col-md-3">
                                <img src="../gambar_buku/<?php echo $data['gambar_buku']; ?>" style="width: 110%">
                            </div>
                            <div class="col-md-9">
                                <h3><?php echo $data['nama_buku'];?></h3>
                                <h8>Tersedia: <?php echo $data['jumlah_buku'];?></h8>
                                <hr>
                                <a href="../page/editBookAdminPage.php?id=<?php echo $data['id_buku'] ; ?>" class="btn btn-dark" onClick="return alert (\'Are you sure want to edit this data?\')">Details</a>
                                <a href="../process/deleteBookAdminProcess.php?id=<?php echo $data['id_buku'] ; ?>"onClick="return confirm ( \'Are you sure want to delete this data?\')"><i style="color: red" class="fa fa-trash fa-2x"></i> </a>
                            </div>
                        </div>

                        <?php 
                            }
                        }
                        ?>

                        </div>
                    </div>
                        
                </div>
            </div>
            
        </thead>
        <tbody>
            
        </tbody>
</div>
</aside>
<script>
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"</script>
</body>
</html>