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
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="../foto/<?php echo $_SESSION["users"]["foto"]; ?>" style = "width:100%">
            </div>
            <div class="col-md-8">
              <a href="../page/editProfilePage.php?id='<?php echo $_SESSION["users"]["foto"]; ?>'" onClick="return 
                        confirm ( \'Are you sure want to edit this data?\')">
                        <i style="color: blue" class="fa fa-edit fa-2x"></i>
                        </a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information User</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <?php echo $_SESSION["users"]["email"] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Username</h6>
                    <?php echo $_SESSION["users"]["username"] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Nama</h6>
                    <?php echo $_SESSION["users"]["nama"] ?></p>
                  </div>
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