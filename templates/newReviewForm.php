<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 600px;">
    <h1 class="text-center">Create New Review</h1>
</div>
    <div class="container">
        <form class="form-horizontal" action = "index.php" methop = "GET">
            <input type="hidden" name="action" value="createNewReview">
            <input type="hidden" name="userId" value="<?= $sessionManager->userIdFromSession() ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="movieId">Movie:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="movieId" id="movieId" required>
                            <option value=""></option>
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
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="reviewTitle">Review Title:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="reviewTitle" maxlength="25"
                               required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="text">Text:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="text" name="text" rows="10" cols="50"
                                  maxlength="1000" required></textarea>
                    </div>
                </div>
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