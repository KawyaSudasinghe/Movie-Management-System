<?php
require_once 'config.php';
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '' || $email === '' || strlen($password) < 6) {
        $error = 'Enter all fields. Password must be at least 6 characters.';
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, hash('sha256', $password)]);
            $success = 'Registration successful. You can now log in.';
        } catch (PDOException $e) {
            $error = 'Email is already registered.';
        }
    }
}

$pageTitle = 'Register';
include 'header.php';
?>

<div class="form-card">
    <h1>Create Account</h1>
    <?php if ($error): ?><div class="alert"><?= e($error) ?></div><?php endif; ?>
    <?php if ($success): ?><div class="success"><?= e($success) ?></div><?php endif; ?>

    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" minlength="6" required>

        <button type="submit">Register</button>
    </form>
</div>

<?php include 'footer.php'; ?>
