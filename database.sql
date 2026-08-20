CREATE DATABASE IF NOT EXISTS movie_management;
USE movie_management;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    release_year INT NOT NULL,
    director VARCHAR(150) NOT NULL,
    duration INT NOT NULL,
    rating DECIMAL(3,1) DEFAULT 0.0,
    description TEXT,
    poster VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password, role)
VALUES ('Administrator', 'admin@movie.com', SHA2('admin123', 256), 'admin');

INSERT INTO movies (title, genre, release_year, director, duration, rating, description, poster)
VALUES
('Inception', 'Sci-Fi', 2010, 'Christopher Nolan', 148, 8.8, 'A skilled thief enters dreams to steal secrets and attempt an impossible idea.', 'https://image.tmdb.org/t/p/w500/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg'),
('Interstellar', 'Sci-Fi', 2014, 'Christopher Nolan', 169, 8.7, 'Explorers travel through a wormhole in search of a new home for humanity.', 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg'),
('The Dark Knight', 'Action', 2008, 'Christopher Nolan', 152, 9.0, 'Batman faces a criminal mastermind who plunges Gotham into chaos.', 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg');
