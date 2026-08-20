<?php
$movieFile = __DIR__ . '/movies.json';
$movies = file_exists($movieFile) ? (json_decode(file_get_contents($movieFile), true) ?: []) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CineVault - Movie Management System</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="navbar">
  <a class="logo" href="index.php">CineVault</a>
  <nav><a href="index.php">Movies</a><a href="admin.php">Admin</a></nav>
</header>
<main class="container">
<section class="hero">
  <div><p class="eyebrow">MOVIE MANAGEMENT SYSTEM</p><h1>Discover your next <span>favorite movie.</span></h1><p>Browse movies, search the collection and keep your movie catalogue organized.</p><a class="btn" href="#movies">Explore Movies</a></div>
  <div class="hero-card"><div class="play">▶</div><p>NOW SHOWING</p><strong>Unlimited stories.<br>One collection.</strong></div>
</section>
<section class="toolbar" id="movies"><input id="search" type="search" placeholder="Search movies..."><select id="genreFilter"><option value="">All genres</option></select></section>
<section><div id="movieGrid" class="movie-grid">
<?php foreach ($movies as $movie): ?>
<article class="movie-card" data-title="<?= htmlspecialchars(strtolower($movie['title'])) ?>" data-genre="<?= htmlspecialchars($movie['genre']) ?>">
<img src="<?= htmlspecialchars($movie['poster']) ?>" alt="<?= htmlspecialchars($movie['title']) ?> poster">
<div class="movie-info"><span class="tag"><?= htmlspecialchars($movie['genre']) ?></span><h3><?= htmlspecialchars($movie['title']) ?></h3><p><?= htmlspecialchars($movie['year']) ?> · <?= htmlspecialchars($movie['duration']) ?></p><p><?= htmlspecialchars($movie['description']) ?></p></div>
</article>
<?php endforeach; ?>
</div></section>
</main>
<script src="js/app.js"></script>
</body>
</html>
