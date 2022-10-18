<?php
    include '../component/sidebarUser.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >

    <div class="body d-flex justify-content-between">
        <h4>Request Buku</h4>
        <h3>
            <a href="../page/listRequestUserPage.php?" style="color: #555747;" class="fa fa-arrow-left"></a>
        </h3>

    </div>
    <hr>
        <table class="table">
            <div class="card-body">
            <form action="../process/requestProcess.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Buku</label>
                    <input class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input class="form-control" id="penulis" name="penulis">
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun Rilis</label>
                    <input class="form-control" id="tahun" name="tahun">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark" name="request">Request</button>
                </div>
            </div>
        </table>