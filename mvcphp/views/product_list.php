<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
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
    <h1>Daftar Produk</h1>
    <a href="index.php?action=home">Beranda</a>
    <table border="1" class="center">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>
                <a href="index.php?action=create">Tambah Produk</a>
            </th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $product['id'] ?>">Edit</a>
                <a href="index.php?action=delete&id=<?= $product['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>