<?php

include("proses.php")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 900px
        }

        .card {
            margin-top: 30px;
        }
        
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <center>
                <h1><b>Laporan Hasil Belajar<b></h1>
                <center>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pendidikan Agama</th>
                            <th scope="col">IPA</th>
                            <th scope="col">IPS</th>
                            <th scope="col">Matematika</th>
                            <th scope="col">Bahasa Indonesia</th>
                            <th scope="col">Bahasa Inggris</th>
                            <th scope="col">Penjaskes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from nilai order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $nisn        = $r2['nisn'];
                            $nama       = $r2['nama'];
                            $kelas     = $r2['kelas'];
                            $agama   = $r2['agama'];
                            $ipa   = $r2['ipa'];
                            $ips   = $r2['ips'];
                            $matematika   = $r2['matematika'];
                            $bahasaIndonesia   = $r2['bahasaIndonesia'];
                            $bahasaInggris   = $r2['bahasaInggris'];
                            $penjas         = $r2['penjas'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nisn ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $kelas ?></td>
                                <td scope="row"><?php echo $agama ?></td>
                                <td scope="row"><?php echo $ipa ?></td>
                                <td scope="row"><?php echo $ips ?></td>
                                <td scope="row"><?php echo $matematika ?></td>
                                <td scope="row"><?php echo $bahasaIndonesia ?></td>
                                <td scope="row"><?php echo $bahasaInggris ?></td>
                                <td scope="row"><?php echo $penjas ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>