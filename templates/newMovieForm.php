<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 600px;">
    <h1 class="text-center">Create New Movie</h1>
</div>
<div class="container">
    <form class="form-horizontal" action="index.php" methop="GET">
        <input type="hidden" name="action" value="createNewMovie">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="title" id="title" maxlength="45"
                           required>
                </div>
            </div>
        <p>
            <div class="form-group row">
                <label for="genre" class="col-sm-2 col-form-label">Genre:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="genre" id="genre" maxlength="45"
                           required>
                </div>
            </div>
        <p>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="classification">Classification:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="classification" maxlength="45"
                           required>
                </div>
            </div>
        <p>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="rating">Rating:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="rating" id="rating" required>
                        <option value=""></option>
                        <option value="1">1 star</option>
                        <option value="2">2 stars</option>
                        <option value="3">3 stars</option>
                        <option value="4">4 stars</option>
                        <option value="5">5 stars</option>
                    </select>
                </div>
            </div>
        <p>
            <div class="form-group row">
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