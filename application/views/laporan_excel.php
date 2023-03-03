<?php 
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: inline; filename=laporan-excel.xls");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
     <!-- Bootstrap --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <table class="table table-striped table">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Nim</th>
            <th>Tanggal Lahir</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telepon</th>
        </tr>
        <?php $no= 1; foreach ($mahasiswa as $mhs) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $mhs->nama ?></td>
            <td><?php echo $mhs->nim ?></td>
            <td><?php echo $mhs->tgl_lahir ?></td>
            <td><?php echo $mhs->jurusan ?></td>
            <td><?php echo $mhs->alamat ?></td>
            <td><?php echo $mhs->email ?></td>
            <td><?php echo $mhs->no_telp ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>