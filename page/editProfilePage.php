<?php
include '../component/sidebarUser.php';

$users = $_SESSION['users'];
$id = $users['id'];
$foto = $users ['foto'];
$username = $users['username'];
$nama = $users['nama'];
$email = $users['email'];
$password = $users['password'];
$sql = mysqli_query($con,"SELECT * FROM users WHERE id = $id");
$data = mysqli_fetch_assoc($sql);
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>EDIT PROFILE PAGE</h4>
    </div>
    <hr>
    <form action="../process/editProfileProcess.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" id="name" name="id" aria-describedby="emailHelp" value="<?php echo $_SESSION["users"]["id"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto" value="<?php echo $_SESSION["users"]["foto"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input class="form-control" id="username" name="username" aria-describedby="emailHelp" value="<?php echo $_SESSION["users"]["username"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $_SESSION["users"]["password"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $_SESSION["users"]["email"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="<?php echo $_SESSION["users"]["nama"]; ?>">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                        </div>
                    </form>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>