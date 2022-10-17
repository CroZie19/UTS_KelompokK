<?php
    
    include '../component/sidebarUser.php';
    
    $users = $_SESSION['users'];
    $id = $users['id'];
    $foto = $users ['foto'];
    $username = $users['username'];
    $nama = $users['nama'];
    $email = $users['email'];
    $password = $users['password'];

?> 

<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-10 mb-10 mb-lg-10"  style="background-color: #f1eee8;">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-1"  style="background-color: #f1eee8;">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="../foto/<?php echo $_SESSION["users"]["foto"]; ?>" style = "width:110%" >
            </div>
            <div class="col-md-8">
              <div class="card-body p-5">
                <h5>
                  <b>Informasi User</b>
                  <a href="../page/editProfilePage.php?id=<?php echo $_SESSION["users"]["foto"]; ?>" class="btn btn-dark" onClick="return alert (\'Are you sure want to edit this data?\')">Edit</a>
                </h5>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6><b>Email</b></h6>
                    <?php echo $_SESSION["users"]["email"] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6><b>Username</b></h6>
                    <?php echo $_SESSION["users"]["username"] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6><b>Nama</b></h6>
                    <?php echo $_SESSION["users"]["nama"] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</section>