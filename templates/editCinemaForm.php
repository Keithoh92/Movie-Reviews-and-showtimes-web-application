<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">Edit Cinema</h1>
</div>
<div class="container">
    <form class="form-horizontal" action="index.php" methop="GET">
        <input type="hidden" name="id" value="<?= $cinema->getId() ?>">
        <input type="hidden" name="action" value="processUpdateCinema">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="location">Location:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="location" maxlength="45" value="<?=
                $cinema->getLocation() ?>" required>
            </div>
        </div>
        <p>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Name:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="name" maxlength="45" value="<?=
                $cinema->getName()
                ?>" required>
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

