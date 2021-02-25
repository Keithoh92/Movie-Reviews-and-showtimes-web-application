<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">Edit Review</h1>
</div>
<div class="container">
    <form class="form-horizontal" action="index.php" methop="GET">
        <input type="hidden" name="id" value="<?= $review->getId(); ?>">
        <input type="hidden" name="action" value="processUpdateReview">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="helpfulness">Helpfulness:</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="helpfulness" maxlength="10" value="<?=
                $review->getHelpfulness(); ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="reviewTitle">Review Title:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="reviewTitle" maxlength="25" value="<?=
                $review->getReviewTitle();
                ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="text">Text:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="text" maxlength="1000" value="<?=
                $review->getText(); ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="userId">User ID:</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="userId" maxlength="11" value="<?=
                $review->getUserId(); ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="movieId">Movie ID:</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="movieId" maxlength="11" value="<?=
                $review->getMovieId(); ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <input class="btn btn-secondary" type="reset" name="reset" value="Reset">
            <input class="btn btn-info" type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>
<?php
require_once __DIR__ . '/_footer.php';
?>

