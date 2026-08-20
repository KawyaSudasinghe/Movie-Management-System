<?php
require_once 'config.php';
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && hash('sha256', $password) === $user['password']) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role']
        ];
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid email or password.';
    }
}

$pageTitle = 'Login';
include 'header.php';
?>

<div class="form-card">
    <h1>Login</h1>
    <?php if ($error): ?><div class="alert"><?= e($error) ?></div><?php endif; ?>
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <p>Admin demo: <strong>admin@movie.com</strong> / <strong>admin123</strong></p>
</div>

<?php include 'footer.php'; ?>
