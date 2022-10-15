<?php
    include '../component/sidebar.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">

    <div class="body d-flex justify-content-between">
        <h4>LIST BUKU ADMIN</h4>
        <h2>
            <a href="../page/addBookAdminPage.php?" style="color: red;" class="fa fa-plus-square"></a>
        </h2>
    </div>
    <hr>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Book Id</th>
                <th scope="col">Book Name</th>
                <th scope="col">Photo</th>
                <th scope="col">Book Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT * FROM buku") or
die(mysqli_error($con));

        if (mysqli_num_rows($query) == 0) {
            echo '<tr> <td colspan="6"> Tidak ada data </td> </tr>';
        }else{
            while($data = mysqli_fetch_assoc($query)){
                // if ($data['jumlah_buku'] <= 0){
                //     $disabled = 'disabled';
                // } else {
                //     $disabled = '';
                // }
                echo'
                <tr>
                    <td>'.$data['id_buku'].'</td>
                    <td>'.$data['nama_buku'].'</td>
                    <td> <img src="../gambar_buku/'. $data['gambar_buku']. '" width="100px"> </td>
                    <td>'.$data['jumlah_buku'].'</td>
                    <td>
                    <a href="../page/editBookAdminPage.php?id='.$data['id_buku'].'"
onClick="return alert ( \'Are you sure want to edit this
data?\')">                        <i style="color: green" class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="../process/deleteBookAdminProcess.php?id='.$data['id_buku'].'"
onClick="return confirm ( \'Are you sure want to delete this
data?\')">                        <i style="color: red" class="fa fa-trash fa-2x"></i>
                    </a>
                    
                </td>
            </tr>'; 
            }
        }
        ?>
        </tbody>
    </table>
</div>
</aside>
<script>
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"</script>
</body>
</html>