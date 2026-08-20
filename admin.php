<?php
// Admin dashboard: add movies and view the current movie list.
// Demo project: data is stored in movies.json for simplicity.
$movieFile = __DIR__ . '/movies.json';
if (!file_exists($movieFile)) file_put_contents($movieFile, json_encode([], JSON_PRETTY_PRINT));

$movies = json_decode(file_get_contents($movieFile), true) ?: [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $year = (int)($_POST['year'] ?? 0);
    $duration = trim($_POST['duration'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $poster = trim($_POST['poster'] ?? '');

    if ($title && $genre && $year && $duration && $description && $poster) {
        $movies[] = [
            'id' => time(),
            'title' => $title,
            'genre' => $genre,
            'year' => $year,
            'duration' => $duration,
            'description' => $description,
            'poster' => $poster
        ];
        file_put_contents($movieFile, json_encode($movies, JSON_PRETTY_PRINT));
        $message = 'Movie added successfully.';
    } else {
        $message = 'Please fill every field.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CineVault - Admin</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="navbar">
  <a class="logo" href="index.php">CineVault</a>
  <nav><a href="index.php">Movies</a><a href="admin.php">Admin</a></nav>
</header>
<main class="container">
  <section class="hero small-hero">
    <div><p class="eyebrow">MANAGEMENT</p><h1>Movie Admin</h1><p>Add and manage the movies shown on the website.</p></div>
  </section>
  <?php if ($message): ?><p class="notice"><?= htmlspecialchars($message) ?></p><?php endif; ?>
  <section class="panel">
    <h2>Add a Movie</h2>
    <form method="post" class="form-grid">
      <input name="title" placeholder="Movie title" required>
      <input name="genre" placeholder="Genre" required>
      <input name="year" type="number" placeholder="Release year" required>
      <input name="duration" placeholder="Duration e.g. 2h 10m" required>
      <input name="poster" placeholder="Poster image URL" required>
      <textarea name="description" placeholder="Short description" required></textarea>
      <button class="btn" type="submit">Add Movie</button>
    </form>
  </section>
  <section class="panel">
    <h2>Current Movies</h2>
    <div class="admin-list">
    <?php foreach ($movies as $movie): ?>
      <div class="admin-row">
        <img src="<?= htmlspecialchars($movie['poster']) ?>" alt="">
        <div><strong><?= htmlspecialchars($movie['title']) ?></strong><span><?= htmlspecialchars($movie['genre']) ?> · <?= htmlspecialchars($movie['year']) ?></span></div>
      </div>
    <?php endforeach; ?>
    </div>
  </section>
</main>
</body>
</html>
