<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "../conection.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $role = $_POST['role'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, role, name, password)
              VALUES (:username, :role, :name, :password)";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'username' => $username,
        'role'     => $role,
        'name'     => $name,
        'password' => $password
    ]);

    echo "Data berhasil ditambahkan!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">                                                                                                                                                                                           
</head>

<?php
include "../conection.php";
?>

<body>
    <div class="card">
        <div class="card-body bg-info">
            <a href="logout.php" class="btn btn-danger">logout</a>
            <a href="TableBarang.php" class="btn btn-secondary">Table Barang</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <?php
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

<form method="post" action="">
    <table border="1" cellpadding="8">
        <tr>
            <th colspan="2">Input Data</th>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><input type="text" name="role" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
            </td>
        </tr>
    </table>
</form>

    <br>

    <table class="table">
    <thead>
        <tr>
            <th scope = "col">No</th>
            <th scope = "col">Username</th>
            <th scope = "col">Nama</th>
            <th scope = "col">Role</th>
            <th scope = "col">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; foreach($users as $usr){?>
        <tr>
            <th scope = "row"><?= $no++?></th>
            <td><?= $usr['username']?></td>
            <td><?= $usr['name']?></td>
            <td><?= $usr['role']?></td>
            <td><a href="">Edit</a> | <a href="">Hapus</a></a></td>
        </tr>
    <?php } ?>
    </tbody>
    </table>

</body>
</html>

