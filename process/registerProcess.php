<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
    
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $foto = $_POST['foto'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $name = $_POST['name'];

        $select = mysqli_querry($con, "SELECT * FROM users where email = '$email' ") or die(mysqli_error($con));
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
            "INSERT INTO users(foto, username, password, email, name) 
                VALUES
            ('$foto', '$username', '$password', '$email', '$name')")
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