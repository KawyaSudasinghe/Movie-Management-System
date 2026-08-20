<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle ?? 'Movie Management System') ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="navbar">
    <a class="logo" href="index.php">🎬 MovieHub</a>
    <nav>
        <a href="index.php">Movies</a>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <a href="add_movie.php">Add Movie</a>
            <a href="dashboard.php">Dashboard</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user'])): ?>
            <span class="welcome">Hi, <?= e($_SESSION['user']['name']) ?></span>
            <a class="logout" href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>
</header>
<main class="container">
