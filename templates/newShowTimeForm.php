<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 600px;">
    <h1 class="text-center">New Show Time</h1>
</div>
<div class="container">
    <form class="form-horizontal" action = "index.php" methop = "GET">
        <input type="hidden" name="action" value="createNewShowTime">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="movieId">Movie:</label>
            <div class="col-sm-10">
                <select class="form-control" name="movieId" id="movieId" required>
<?php
foreach ($movies as $movie):
    ?>
    <option value="<?= $movie->getId(); ?>"><?= $movie->getTitle(); ?></option>
<?php
endforeach;
?>
                </select>
            </div>
        </div>
    <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="cinemaId">Cinema:</label>
            <div class="col-sm-10">
                <select class="form-control" name="cinemaId" id="cinemaId" required>
<?php
foreach ($cinemas as $cinema):
    ?>
    <option value="<?= $cinema->getId(); ?>"><?= $cinema->getName(); ?></option>
<?php
endforeach;
?>
                </select>
            </div>
        </div>
    <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="date">Date:</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" name="date" required>
            </div>
        </div>
    <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="time">Time:</label>
            <div class="col-sm-10">
                <input class="form-control" type="time" name="time" required>
            </div>
        </div>
    <p>
        <div class="form-group row>
            <div class="col-sm-10">
                <input class="btn btn-secondary" type="reset" name="reset" value="Reset">
                <input class="btn btn-info" type="submit" name="submit" value="Submit">
            </div>
        </div>
    </form>
</div>
<?php
require_once __DIR__ . '/_footer.php';
?>