<!DOCTYPE html>
<html>
<head>
    <title>Daftar User</title>
</head>
<style>
    body{
        text-align: center;
    }
    .center{
        margin-left: auto;
        margin-right: auto;
    }
</style>
<body>
    <h1>Daftar User</h1>
    <a href="index.php?action=home">Beranda</a>

    <table border="1" class="center">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>
                <a href="index.php?action=user_create">Tambah User</a>
            </th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
    <td>
        <a href="index.php?action=user_edit&id=<?= $user['id'] ?>">Edit</a>
        <a href="index.php?action=user_delete&id=<?= $user['id'] ?>" onclick="return confirm('Hapus user ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>