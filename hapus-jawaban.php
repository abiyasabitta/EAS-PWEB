<?php
    include("config.php");

    session_start();
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = session_id();
        $_SESSION['user_id'] = '05111940000044';
    }

    if (isset($_GET['id'])) {
        $tgs_id = $_GET['id'];
        $mhs_id = $_SESSION['user_id'];

        $sql = "UPDATE tugas_mahasiswa SET tm_nama_url=NULL, tm_url=NULL, tm_display_file=NULL, tm_file=NULL, tm_nilai=NULL, tm_status='belum dikumpulkan' WHERE tgs_id=$tgs_id AND mhs_id='$mhs_id'";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: detail-tugas.php?id=' . $tgs_id);
        } else {
            die("gagal menghapus...");
        }

    } else {
        die("akses dilarang...");
    }

?>