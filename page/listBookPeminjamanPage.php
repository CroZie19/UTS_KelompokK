<?php
    include '../component/sidebar.php'
?> 
    <div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >
    <div class="body d-flex justify-content-between" >
        <h4>List Peminjaman Buku User</h4>
        
    </div>
    <hr>
        <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Sampul Buku</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Email User</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT p.id as id, b.nama_buku as nama_buku, b.gambar_buku as gambar, b.jumlah_buku as jumlah, p.status, p.tanggal_pengembalian, u.email FROM peminjaman p join buku b on (p.id_buku = b.id_buku) join users u on (p.id_user = u.id) ") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td align="center" colspan="8"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_assoc($query)){
                    echo'
                    <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data['nama_buku'].'</td>
                        <td>
                            <img src="../gambar_buku/'.$data['gambar'].'" style="width: 20%">
                        </td>
                        <td>'
                        ?>
                        <?php
                            if($data['status']){
                                echo "Sudah Dikembalikan";
                            }else{
                                echo "Dipinjam";
                            }
                        ?>
                        <?php
                        echo '
                        </td>
                        <td>'.$data['tanggal_pengembalian'].'</td>
                        <td>'.$data['email'].'</td>
                        <td>'
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