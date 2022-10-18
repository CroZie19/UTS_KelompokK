<?php
    include '../component/sidebarUser.php'
?> 
<div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >
    <div class="body d-flex justify-content-between" >
        <h4>LIST REQUEST BUKU USER</h4>
        <h4>
            <a href="../page/requestPage.php?" style="color: #555747;" class="fa fa-plus"> Tambah Request</a>
        </h4>
        
    </div>
    <hr>
        <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Penulis</th>
                <th scope="col">Tahun Rilis</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $email = $_SESSION['email'];
            $query = mysqli_query($con, "SELECT r.id, r.nama_buku, r.penulis, r.tahun_rilis FROM request r join users u on (r.id_user = u.id) WHERE u.email = '$email'") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td align="center" colspan="6"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_assoc($query)){
                    echo'
                    <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data['nama_buku'].'</td>
                        <td>'.$data['penulis'].'</td>
                        <td>'.$data['tahun_rilis'].'</td>
                        <td>
                        <a href="../page/editRequestPage.php?id='.$data['id'].'" onClick="return confirm ( \'Apakah mau diedit?\')">                      
                        <i style="color: #555747" class="fa fa-edit fa-2x"></i></a>
                        <a href="../process/deleteRequestProcess.php?id='.$data['id'].'" onClick="return confirm ( \'Apakah mau dihapus?\')">                      
                        <i style="color: red" class="fa fa-trash fa-2x"></i></a>
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