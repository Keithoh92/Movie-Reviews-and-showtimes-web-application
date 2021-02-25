<?php
    require_once __DIR__ . '/_header.php';
?>
    <div class="mx-auto" style="width: 400px;">
        <h1 class="text-center">Administration</h1>
    </div>

    <hr>
        <div class="d-flex justify-content-center">
            <a href="index.php?action=newMovieForm" class="btn btn-info mx-2">New Movie Form</a>
            <a href="index.php?action=listAllMovies" class="btn btn-info mx-2">Show Movies</a>
        </div>
    <hr>
        <div class="d-flex justify-content-center">
            <a href="index.php?action=newCinemaForm" class="btn btn-info mx-2">New Cinema Form</a>
            <a href="index.php?action=Search Cinemas" class="btn btn-info mx-2">Show Cinemas</a>
        </div>
    <hr>
        <div class="d-flex justify-content-center">
            <a href="index.php?action=listUsers" class="btn btn-info mx-2">Show Users</a>
        </div>
    <hr>
        <div class="d-flex justify-content-center">
            <a href="index.php?action=newReviewForm" class="btn btn-info mx-2">New Review Form</a>
            <a href="index.php?action=listAllReviews" class="btn btn-info mx-2">Show Reviews</a>
        </div>
    <hr>
        <div class="d-flex justify-content-center">
            <a href="index.php?action=newShowTimeForm" class="btn btn-info mx-2">New Show-time Form</a>
            <a href="index.php?action=listShowTimes" class="btn btn-info mx-2">Show ShowTimes</a>
        </div>
    <hr>
<?php
require_once __DIR__ . '/_footer.php';
?>