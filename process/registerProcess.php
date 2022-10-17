<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
    
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $file_temp  = $_FILES['foto']['tmp_name'];
        $users = $_FILES['foto']['name'];
        move_uploaded_file($file_temp, '../foto/'.$users);
        $username = $_POST['username'];      
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama = $_POST['nama'];

        $select = mysqli_query($con, "SELECT * FROM users where email = '$email' ") or die(mysqli_error($con));
        if(mysqli_num_rows($select)){
            //kalau email ketemu sama tampilkan error
            echo
                '<script>
                alert("Email sudah Digunakan"); 
                window.location = "../index.php"
                </script>';
        }
        else{
                // Melakukan insert ke databse dengan query dibawah ini
            $query = mysqli_query($con,
            "INSERT INTO users(foto, username, password, email, nama) 
                VALUES
            ('$users', '$username', '$password', '$email', '$nama')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        
            if($query){
                echo
                    '<script>
                    alert("Register Success"); 
                    window.location = "../index.php"
                    </script>';
            }else{
                    echo
                    '<script>
                        alert("Register Failed");
                    </script>';
            }
        }
    }else{
    echo
        '<script>
            window.history.back()
        </script>';
    }
        
        

?>