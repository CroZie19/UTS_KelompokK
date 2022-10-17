<?php
    include '../component/sidebarUser.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >

    <div class="body d-flex justify-content-between">
        <h4>Kunjungan Perpustakaan</h4>
    </div>
    <hr>
        <table class="table">
            <div class="card-body">
            <form action="../process/visitProcess.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pengunjung</label>
                    <input class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Sesi</label>
                    <select class="form-select" aria-label="Default select example" name="sesi" id="sesi">
                    <option value="" disabled selected hidden>Pilih Sesi</option>
                        <option value="Sesi 1 (08.00-10.30)">Sesi 1 (08.00-10.30)</option>
                        <option value="Sesi 2 (11.00-13.30)">Sesi 2 (11.00-13.30)</option>
                        <option value="Sesi 3 (14.00-16.30)">Sesi 3 (14.00-16.30)</option>
                    </select>
                </div>
                <div class="mb-3" style="width: 500px;">
                    <label for="exampleInputTanggalPengembalian" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark" name="visit">Kunjung</button>
                </div>
            </div>
        </table>

    <div class="body d-flex justify-content-between" >
        <h4>Riwayat Kunjungan</h4>
        
    </div>
    <hr>
        <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengunjung</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Sesi</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $email = $_SESSION['email'];
            $query = mysqli_query($con, "SELECT k.id, k.nama, k.sesi, k.tanggal, k.status FROM kunjung k JOIN users u on (k.id_user = u.id) WHERE u.email = '$email'") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td align="center" colspan="6"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_assoc($query)){
                    echo'
                    <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data['nama'].'</td>
                        <td>'.$data['tanggal'].'</td>
                        <td>'.$data['sesi'].'</td>
                        <td>'
                        ?>
                        <?php
                            if($data['status']){
                                echo "Disetujui";
                            }else{
                                echo "Menunggu Konfirmasi";
                            }
                        ?>
                        <?php
                        echo '
                        </td>
                    </tr>';
                    $no++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>