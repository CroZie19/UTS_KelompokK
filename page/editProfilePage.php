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
    <div class="container p-3 m-4 h-100" style="background-color: #f1eee8; border-top: 5px
solid #1e1e1c; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >   
    <div class="body d-flex justify-content-between">
        <h4>EDIT PROFILE USER</h4>
        <h3>
            <a href="../page/profilePage.php?" style="color: #555747;" class="fa fa-arrow-left"></a>
        </h3>
    </div>
    <hr>
    <form action="../process/editProfileProcess.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" id="name" name="id" aria-describedby="emailHelp" value="<?php echo $_SESSION["users"]["id"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto" value="<?php echo $_SESSION["users"]["foto"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input class="form-control" id="username" name="username" aria-describedby="emailHelp" value="<?php echo $_SESSION["users"]["username"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $_SESSION["users"]["password"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $_SESSION["users"]["email"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="<?php echo $_SESSION["users"]["nama"]; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark" name="edit">Edit Profil User</button>
                        </div>
                    </form>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>