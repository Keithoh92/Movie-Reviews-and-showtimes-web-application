<form class="form-inline">
    <div class="form-group">
        <div class="form-group mx-2">
            <label for="movie" class="font-weight-bold">Movie</label>
        </div>
            <select class="form-control" name="movie" id="movie">
                <option value="">All</option>
<?php
foreach ($movies as $movie):
    ?>
                <option value="<?= $movie->getId(); ?>"><?= $movie->getTitle(); ?></option>
<?php
endforeach;
?>
            </select>
        <div class="form-group mx-2">
            <label for="rating" class="font-weight-bold">Rating</label>
        </div>
            <select class="form-control" name="rating" id="rating">
                <option value="">All</option>
                <option value="1">1 star</option>
                <option value="2">2 stars</option>
                <option value="3">3 stars</option>
                <option value="4">4 stars</option>
                <option value="5">5 stars</option>
            </select>
        <div class="form-group mx-2">
            <label for="helpfulness" class="font-weight-bold">Helpfulness</label>
        </div>
            <select class="form-control" name="helpfulness" id="helpfulness">
                <option value="">All</option>
                <option value="1">1 thumb</option>
                <option value="2">2 thumbs</option>
                <option value="3">3 thumbs</option>
                <option value="4">4 thumbs</option>
                <option value="5">5 thumbs</option>
            </select>
        <div class="btn-toolbar mx-2">
            <input class="btn btn-info" type="submit" name="action" value="Search Reviews">
        </div>
<?php
if ($isLoggedIn):
?>
        <div class="btn-toolbar mx-2">
            <a href="index.php?action=newReviewForm" class="btn btn-info">New Review Form</a>
        </div>
<?php
endif;
?>
    </div>
</form>
<p>
</p>