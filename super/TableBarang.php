<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <link rel="stylesheet" href="assets/css/style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">                                                                                                                
</head>

<?php include "../conection.php"; ?>
<body>
     <div class="card">
        <div class="card-body bg-info">
            <a href="logout.php" class="btn btn-danger">logout</a>
            <a href="index.php" class="btn btn-secondary">User</a>
        </div>
    </div>

     <?php
    $stmt = $pdo->query("SELECT * FROM barang");
    $barang = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Tanggal Terima</th>
        </tr>
    <?php $no = 1; foreach($barang as $brg){?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?=" "?></td>
            <td><?= $brg['nama_barang']?></td>
            <td><?= $brg['kode_barang']?></td>
            <td><?= $brg['tanggal_masuk']?></td>
        </tr>
    <?php } ?>
    </table>

</body>
</html>