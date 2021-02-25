<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">Edit Movie</h1>
</div>
<div class="container">
    <form class="form-horizontal" action="index.php" methop="GET">
        <input type="hidden" name="id" value="<?= $movie->getId(); ?>">
        <input type="hidden" name="action" value="processUpdateMovie">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="title">Title:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="title" maxlength="45" value="<?=
                    $movie->getTitle(); ?>" required>
                </div>
            </div>
        <p>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="genre">Genre:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="genre" maxlength="45" value="<?=
                    $movie->getGenre();
                    ?>" required>
                </div>
            </div>
        <p>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="classification">Classification:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="classification" maxlength="45"
                           value="<?= $movie->getClassification(); ?>" required>
                </div>
            </div>
        <p>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="rating">Rating:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="rating" maxlength="11" value="<?=
                    $movie->getRating() ?>" required>
                </div>
            </div>
        <p>
            <div class="form-group row">
                <input class="btn btn-secondary" type="reset" name="reset" value="Submit">
                <input class="btn btn-info" type="submit" name="submit" value="Submit">
            </div>
    </form>
</div>
<?php
require_once __DIR__ . '/_footer.php';
?>
