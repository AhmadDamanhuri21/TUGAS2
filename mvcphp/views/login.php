<h2>Login</h2>

<form method="POST" action="index.php?action=login_process">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>

<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>