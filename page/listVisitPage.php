<?php
    include '../component/sidebar.php'
?> 
<div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >
    <div class="body d-flex justify-content-between" >
        <h4>LIST Kunjungan Perpustakaan</h4>
        
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
            $query = mysqli_query($con, "SELECT k.id, k.nama, k.sesi, k.tanggal, k.status FROM kunjung k JOIN users u on (k.id_user = u.id)") or die(mysqli_error($con));

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
                                echo '<a href="../process/deleteVisitProcess.php?id='.$data['id'].'" onClick="return confirm ( \'Apakah mau dihapus?\')">                      <i style="color: red" class="fa fa-trash fa-2x"></i></a>';
                            }else{
                                echo '<a href="../process/setujuVisitProcess.php?id='.$data['id'].'"<i style="color: green" class="fa fa-check fa-2x"></i></a>';
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