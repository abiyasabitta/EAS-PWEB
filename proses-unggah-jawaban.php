<!-- simpan unggahan jawaban -->
<?php
    include("config.php");

    session_start();
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = session_id();
        $_SESSION['user_id'] = '05111940000044';
    }

    if (isset($_POST['simpan'])) {
        $tipe = $_POST['tipe'];
        $nama_file = $_POST['nama_file'];
        $file = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $nama_tautan = $_POST['nama_tautan'];
        $tautan = $_POST['tautan'];
        $tgs_id = $_GET['id'];
        $mhs_id = $_SESSION['user_id'];

        if (!empty($file)) {
            if (!empty($nama_file)) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $display_file = $nama_file . '.' . $ext;
            } else {
                $display_file = $file;
            }

            $file = date('dmYHis') . '_' . $display_file;
            $path_file = 'files/' . $file;

            if (is_uploaded_file($temp)) {
                if (move_uploaded_file($temp, $path_file)) {
                    $sql = "UPDATE tugas_mahasiswa SET tm_display_file='$display_file', tm_file='$file', tm_status='menunggu dinilai' WHERE tgs_id=$tgs_id AND mhs_id='$mhs_id'";
                    $query = mysqli_query($db, $sql);
                    
                    if ($query) {
                        header('Location: detail-tugas.php?id=' . $tgs_id);
                    } else {
                        die("gagal query");
                    }
                } else {
                    die("gagal pindah");
                } 
            } else {
                die("gagal upload");
            }
        } else {
            if (!empty($nama_tautan)) {
                $sql = "UPDATE tugas_mahasiswa SET tm_nama_url='$nama_tautan', tm_url='$tautan', tm_status='menunggu dinilai' WHERE tgs_id=$tgs_id AND mhs_id='$mhs_id'";
            } else {
                $sql = "UPDATE tugas_mahasiswa SET tm_url='$tautan', tm_status='menunggu dinilai' WHERE tgs_id=$tgs_id AND mhs_id='$mhs_id'";
            }

            $query = mysqli_query($db, $sql);
            if ($query) {
                header('Location: detail-tugas.php?id=' . $tgs_id);
            } else {
                die("gagal query");
            }
        }
    } else {
        die("Akses dilarang...");
    }
    
?>