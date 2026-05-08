<!DOCTYPE html>
<html>
<head>
    <title>Form User</title>
</head>
<body>
    <h1><?= isset($user) ? 'Edit' : 'Tambah' ?> User</h1>

    <form method="POST" action="index.php?action=<?= isset($user) ? 'user_update&id=' . $user['id'] : 'user_store' ?>">
        
        <label>Nama:</label>
        <input type="text" name="name" value="<?= isset($user) ? $user['name'] : '' ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" required>

        <label>password:</label>
        <input type="password" name="password">

        <button type="submit">Simpan</button>
    </form>

    <a href="index.php?action=user_index">Kembali</a>
</body>
</html>