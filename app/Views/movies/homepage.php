<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Tonggeret</title>
    <link rel="stylesheet" href="<?= base_url('css/homepage.css') ?>">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="/movies/homepage" class="brand">Tonggeret</a>
                <ul class="nav-links">
                    <li><a href="#">Top Rated</a></li>
                    <li><a href="#">Saves</a></li>
                </ul>
            </div>
            <div class="navbar-right">
                <form id="searchForm" onsubmit="searchMovies(event)">
                    <input type="search" id="searchQuery" name="query" placeholder="Search for movies..." />
                    <button type="submit"><i class="icon-search">🔍</i></button>
                </form>
                <a href="/auth/logout"><i class="icon-user">👤</i></a>
            </div>
        </nav>
    </header>

    <main>
        <section id="searchResults" style="display: none;">
        </section>

        <section id="carouselSectionHot" class="carousel-section">
            <h2>Hot This Month</h2>
            <div class="carousel-container">
                <button class="carousel-prev" onclick="moveCarousel('carouselHot', -1)">❮</button>
                <div class="carousel" id="carouselHot">
                    <?php foreach ($movies as $movie): ?>
                        <div class="carousel-item">
                            <a href="<?= base_url('reviews/index/' . $movie['id']); ?>">
                                <img src="https://image.tmdb.org/t/p/w500<?= $movie['poster_path']; ?>" alt="<?= $movie['title']; ?>" />
                                <h3><?= $movie['title']; ?></h3>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-next" onclick="moveCarousel('carouselHot', 1)">❯</button>
            </div>
        </section>


        <section id="carouselSectionTopRated" class="carousel-section">
            <h2>Top Rated</h2>
            <div class="carousel-container">
                <button class="carousel-prev" onclick="moveCarousel('carouselTopRated', -1)">❮</button>
                <div class="carousel" id="carouselTopRated">
                    <?php foreach ($movies as $movie): ?>
                        <div class="carousel-item">
                            <a href="<?= base_url('reviews/index/' . $movie['id']); ?>">
                                <img src="https://image.tmdb.org/t/p/w500<?= $movie['poster_path']; ?>" alt="<?= $movie['title']; ?>" />
                                <h3><?= $movie['title']; ?></h3>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-next" onclick="moveCarousel('carouselTopRated', 1)">❯</button>
            </div>
        </section>
    </main>

    <!-- Link to external JavaScript file -->
    <script src="<?= base_url('js/homepage.js') ?>"></script>
</body>

</html>