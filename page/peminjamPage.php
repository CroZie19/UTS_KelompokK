<?php
    include '../component/sidebarUser.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: black; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);color: #f6ce59;" >
        
    <div class="countainer card-content w-50">
        <h4>Loan Page</h4>
        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $date = date('d-m-Y', strtotime("+7 days"));
            }
                $data_buku = mysqli_query($con,"SELECT * FROM buku WHERE id_buku='$id'") or die(mysqli_error($con));
                if(mysqli_num_rows($data_buku) == 0){
                    echo '<tr> <td colspan="6"> Tidak ada data </td> </tr>';
                }else{
                    while($data = mysqli_fetch_assoc($data_buku)){
                        echo' 
                            <table>
                                <form action="../process/loanProcess.php" method="post">
                                <input hidden type="text" id="id" name="id" value="' . $data['id_buku'] . '"/>   
                                <tr>
                                    <td>
                                        <div class="mb-4" style="width: 500px;">
                                            <label for="exampleInputNamaPeminjam" class="form-label">Nama Buku</label>
                                            <input class="form-control" type="text" id="nama_buku" name="nama_buku" value="'. $data['nama_buku'] .'"disabled/>
                                        </div>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <div class="mb-4" style="width: 500px;">
                                            <label for="exampleInputTanggalPengembalian" class="form-label">Return Date</label>
                                            <input type="date" class="form-control" id="tglPengembalian" name="tglPengembalian" aria-describedby="tglPengembalian">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                                    </td>
                                </tr>  
                                </form>	
                            </table>';
                    }
                }
        ?>

    </div>
</div>
</aside>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>
</html>
