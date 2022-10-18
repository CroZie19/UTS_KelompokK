<?php
    include '../component/sidebar.php';
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM buku WHERE id_buku = '$id'");
    while($d = mysqli_fetch_array($query)){
?>
    <div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >

    <div class="body d-flex justify-content-between">
        <h4>EDIT BUKU ADMIN</h4>
        <h3>
            <a href="../page/listBookAdminPage.php?" style="color: #555747;" class="fa fa-arrow-left"></a>
        </h3>
    </div>
    <hr>
        <table class="table">
            <div class="card-body">
            <form action="../process/editBookAdminProcess.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_buku" class="form-label">Book Name</label>
                    <input type="hidden" name="id_buku" value="<?php echo $d['id_buku']; ?>">
                    <input class="form-control" id="nama_buku" name="nama_buku" value="<?php echo $d['nama_buku'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="gambar_buku" class="form-label">Photo</label>
                    <br>
                    <img src="../gambar_buku/<?php echo $d['gambar_buku']; ?>" width="300px" />
                    <input class="form-control" type="file" id="gambar_buku" name="gambar_buku" value="<?php echo $d['gambar_buku']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Book Amount</label>
                    <input class="form-control" id="jumlah_buku" name="jumlah_buku" value="<?php echo $d['jumlah_buku']; ?>" required>
                </div>
                </div>
                <div class="d-grid gap-2">
                    <button style="background-color: black;" type="submit" class="btn btn-primary" name="edit">Edit Book Admin</button>
                </div>
            </div>
            </form>
            <?php
        }
        ?>
            </table>