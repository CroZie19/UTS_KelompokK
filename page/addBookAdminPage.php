<?php
    include '../component/sidebar.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >

    <div class="body d-flex justify-content-between">
        <h4>Tambah Buku Admin</h4>
        <h3>
            <a href="../page/listBookAdminPage.php?" style="color: #555747;" class="fa fa-arrow-left"></a>
        </h3>
    </div>
    <hr>
        <table class="table">
            <div class="card-body">
            <form action="../process/addBookAdminProcess.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Buku</label>
                    <input class="form-control" id="nama_buku" name="nama_buku" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Sampul Buku</label>
                    <input class="form-control" type="file" id="photo" name="gambar_buku" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Tersedia</label>
                    <input class="form-control" id="jumlah_buku" name="jumlah_buku" required>
                </div>
                <div class="d-grid gap-2">
                    <button style="background-color: black;" type="submit" class="btn btn-primary" name="add">Tambah Buku Admin</button>
                </div>
            </div>

        </table>
    


