const apiKey = "247a53b2c562a91054f961f40c3bd6c4";

function moveCarousel(sectionId, direction) {
  const carousel = document.getElementById(sectionId);
  const scrollAmount = carousel.scrollWidth / 6;
  carousel.scrollBy({ left: direction * scrollAmount, behavior: "smooth" });
}

function searchMovies(event) {
  event.preventDefault();
  const query = document.getElementById("searchQuery").value;
  if (query) {
    fetch(
      `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${encodeURIComponent(
        query
      )}`
    )
      .then((response) => response.json())
      .then((data) => {
        if (data.results.length > 0) {
          displaySearchResults(data.results);
        } else {
          displayNoResults();
        }
      })
      .catch((error) => console.error("Error:", error));
  }
}

function displaySearchResults(movies) {
  document.getElementById("carouselSectionHot").style.display = "none";
  document.getElementById("carouselSectionTopRated").style.display = "none";

  const searchResults = document.getElementById("searchResults");
  searchResults.style.display = "block";
  searchResults.innerHTML = "";

  movies.forEach((movie) => {
    const movieCard = `
             <div class="movie-card">
                <a href="${encodeURI("/reviews/index/" + movie.id)}">
                    <img src="https://image.tmdb.org/t/p/w500${
                      movie.poster_path
                    }" alt="${movie.title}" />
                    <h3>${movie.title}</h3>
                </a>
            </div>
        `;
    searchResults.innerHTML += movieCard;
  });
}

function displayNoResults() {
  document.getElementById("carouselSectionHot").style.display = "none";
  document.getElementById("carouselSectionTopRated").style.display = "none";

  const searchResults = document.getElementById("searchResults");
  searchResults.style.display = "block";
  searchResults.innerHTML = "<p>No movies found matching your search.</p>";
}
