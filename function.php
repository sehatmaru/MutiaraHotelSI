<?php
    global $conn;
    $conn = mysql_connect("localhost","root", "");
    if(!$conn){
        die("database connect problem");
    }else{
    $db_use = mysql_select_db("mydb", $conn) or die("select db problem!!");
    }
    
    function execQ($strQ){ 
        global $conn;
        $res = mysql_query($strQ, $conn);  
        return $res;
    }
    
    function tambah(){
        if(isset($_POST['submit'])){
            $nama       = $_POST['nama'];
            $alamat     = $_POST['alamat']; 
            $email      = $_POST['email']; 
            $rate       = $_POST['rate'];
            $komentar   = $_POST['komentar'];

            $strQ = "INSERT INTO feedback VALUES(NULL,'$nama', '$alamat', '$email', '$rate', '$komentar', NULL)";
            $resItem = execQ($strQ);
        }
    }
    
    function edit(){
        if(isset($_POST['simpan'])){
             $id = $_POST['id']; 
             $name = $_POST['name']; 
             $email = $_POST['email']; 
             $address = $_POST['address'];
             
             $strQ = "UPDATE mahasiswa SET name='$name', email='$email', address='$address', picture='$picture' WHERE id='$id'";
             $resItem = execQ($strQ);
             
             if($resItem){
                 header("location:list_mahasiswa.php");
             }else{
                 echo 'Gagal menambah data!';
                 header("location:edit.php");
             }
        }
    }
    
    function hapus(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $cek = mysql_query("SELECT id FROM mahasiswa WHERE id='$id'");
            if(mysql_num_rows($cek) == 0){
                echo '<script>window.history.back()</script>';
            }else{
                $strQ = "DELETE FROM mahasiswa WHERE id='$id'";
                $resItem = execQ($strQ);
                
                if($strQ){
                    header("location:list_mahasiswa.php");
                }else{
                    echo 'Gagal menghapus data!';
                    header("location:list_mahasiswa.php");
                }
        }
    }else{
    }
    }