<?php
require_once 'config.php';
require_admin();

$totalMovies = $pdo->query("SELECT COUNT(*) FROM movies")->fetchColumn();
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$avgRating = $pdo->query("SELECT COALESCE(ROUND(AVG(rating),1),0) FROM movies")->fetchColumn();

$pageTitle = 'Dashboard';
include 'header.php';
?>

<h1>Admin Dashboard</h1>

<div class="stats">
    <div class="stat"><span><?= e($totalMovies) ?></span><small>Total Movies</small></div>
    <div class="stat"><span><?= e($totalUsers) ?></span><small>Registered Users</small></div>
    <div class="stat"><span><?= e($avgRating) ?></span><small>Average Rating</small></div>
</div>

<div class="dashboard-box">
    <h2>Quick Actions</h2>
    <a class="button" href="add_movie.php">+ Add Movie</a>
    <a class="button secondary" href="index.php">View Movies</a>
</div>

<?php include 'footer.php'; ?>
