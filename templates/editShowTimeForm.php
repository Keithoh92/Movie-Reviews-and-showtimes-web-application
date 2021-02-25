<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">Edit Show Time</h1>
</div>
<div class="container">
    <form class="form-horizontal" action="index.php" methop="GET">
        <input type="hidden" name="id" value="<?= $showTime->getId(); ?>">
        <input type="hidden" name="action" value="processUpdateShowTime">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="date">Date:</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" name="date" value="<?=
                $showTime->getDate(); ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="time">Time:</label>
            <div class="col-sm-10">
                <input class="form-control" type="time" name="time" value="<?=
                $showTime->getTime();
                ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="cinemaId">cinema ID:</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="cinemaId" maxlength="11" value="<?=
                $showTime->getCinemaId(); ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="movieId">Movie ID:</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="movieId" maxlength="11" value="<?=
                $showTime->getMovieId(); ?>">
            </div>
        </div>
        <p>
        <div class="form-group row">
            <input class="btn btn-secondary" type="reset" name="reset" value="reset">
            <input class="btn btn-info" type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>
<?php
require_once __DIR__ . '/_footer.php';
?>


