const cards = [...document.querySelectorAll('.movie-card')];
const search = document.querySelector('#search');
const genreFilter = document.querySelector('#genreFilter');

const genres = [...new Set(cards.map(card => card.dataset.genre).filter(Boolean))].sort();
genres.forEach(genre => {
  const option = document.createElement('option');
  option.value = genre;
  option.textContent = genre;
  genreFilter.appendChild(option);
});

function filterMovies() {
  const term = search.value.toLowerCase().trim();
  const genre = genreFilter.value;
  cards.forEach(card => {
    const matchesText = card.dataset.title.includes(term);
    const matchesGenre = !genre || card.dataset.genre === genre;
    card.style.display = matchesText && matchesGenre ? '' : 'none';
  });
}
search.addEventListener('input', filterMovies);
genreFilter.addEventListener('change', filterMovies);
