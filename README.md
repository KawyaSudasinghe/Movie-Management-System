# Movie Management System

## Technologies
- HTML
- CSS
- JavaScript
- PHP
- MySQL
- No frameworks

## Main features
- User registration and login
- Admin login
- Add movies
- Edit movies
- Delete movies
- Search movies
- Filter by genre
- View movie details
- Admin dashboard
- Responsive design

## XAMPP setup
1. Install XAMPP.
2. Start Apache and MySQL.
3. Copy this folder into `C:\xampp\htdocs\`.
4. Open phpMyAdmin.
5. Import `database.sql`.
6. Open `http://localhost/movie_management_system/`.

Admin:
- Email: admin@movie.com
- Password: admin123

## 3-member GitHub division

### Member 1 — Movie Management
Own:
- index.php
- movie.php
- add_movie.php
- edit_movie.php
- delete_movie.php

### Member 2 — Authentication
Own:
- login.php
- register.php
- logout.php
- config.php

### Member 3 — Dashboard + UI
Own:
- dashboard.php
- header.php
- footer.php
- css/style.css
- js/script.js

Shared:
- database.sql
- README.md

Each member should work on their own Git branch. Do not edit the same files at the same time if you can avoid it.

## Git workflow

Clone:
`git clone YOUR_GITHUB_REPO_URL`

Enter:
`cd movie_management_system`

Create your branch:
`git checkout -b member1-movies`

Check branch:
`git branch`

After changes:
`git status`
`git add .`
`git commit -m "Add movie management features"`
`git push -u origin member1-movies`

For member 2:
`git checkout -b member2-auth`

For member 3:
`git checkout -b member3-ui-dashboard`

When finished, push each branch and create a Pull Request on GitHub to merge into `main`.
