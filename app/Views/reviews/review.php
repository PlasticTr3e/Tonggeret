<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $movie['title']; ?> - Review</title>
    <link rel="stylesheet" href="<?= base_url('css/review.css') ?>">

</head>

<body>
    <header>
        <nav>
            <a href="<?= "/movies/homepage"; ?>">Back to Home</a>
        </nav>
    </header>

    <main>
        <!-- Movie Details Section -->
        <section class="movie-details">
            <div class="movie-poster">
                <img src="https://image.tmdb.org/t/p/w500<?= $movie['poster_path']; ?>" alt="<?= $movie['title']; ?>" />
            </div>
            <div class="movie-info">
                <h1><?= $movie['title']; ?></h1>
                <p><strong>Release Date:</strong> <?= $movie['release_date']; ?></p>
                <p><strong>Overview:</strong> <?= $movie['overview']; ?></p>
            </div>
        </section>
        
        <section class="movie-review">
            <h2>Leave a Review</h2>
            <form action="<?= base_url('reviews/submit'); ?>" method="post">
                <input type="hidden" name="tmdb_id" value="<?= $tmdb_id; ?>"> <!-- Use TMDB ID -->
                <div class="input-group">
                    <label for="rating">Rating (1 to 5)</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required>
                </div>
                <div class="input-group">
                    <label for="review_text">Your Review</label>
                    <textarea name="review_text" id="review_text" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn">Submit Review</button>
            </form>
        </section>

        <section class="movie-reviews">
            <h2>Reviews</h2>
            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="review-item">
                        <p><strong>Rating:</strong> <?= $review['rating']; ?>/5</p>
                        <p><?= $review['review_text']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No reviews yet. Be the first to leave a review!</p>
            <?php endif; ?>
        </section>

    </main>
</body>

</html>