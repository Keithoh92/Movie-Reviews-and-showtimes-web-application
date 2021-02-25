<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">Read Review</h1>
</div>
    <?php
    require_once __DIR__ . '/_reviewSearchBar.php';
    ?>
<div class="card text-white bg-secondary">
    <h6 class="card-header text-center text-white">Movie Title: <?= $movieTitle ?></h6>
    <h5 class="card-header text-center">Review Title: <?= $review->getReviewTitle(); ?></h5>
    <span class="card-header text-center text-warning">Helpfulness:
        <?php
        for ($i = 0; $i < $review->getHelpfulness(); $i++):
        ?>
            <i class="fas fa-thumbs-up"></i>
        <?php
        endfor;
        ?>

    </span>
    <div class="card-body">
        <p class="card-text text-justify"><?= $review->getText(); ?></p>
        <div class="card-footer">
            <div class="btn-toolbar">
                <button type="button" class="btn btn-info" value="Go back!" onclick="history.back()">Back to Review
                    Results</button>
                <form class="form-inline">
                    <div class="form-group mx-2">
                        <div class="form-group mx-2">
                            <label for="reviewRating" class="font-weight-bold">Review&nbsp;
                                Rating</label>
                        </div>
                        <select class="form-control" name="helpfulness" id="helpfulness" required>
                            <option value=""></option>
                            <option value="1">1 thumb</option>
                            <option value="2">2 thumbs</option>
                            <option value="3">3 thumbs</option>
                            <option value="4">4 thumbs</option>
                            <option value="5">5 thumbs</option>
                        </select>
                    </div>
                    <input class="btn btn-info" type="submit" name="action" value="Rate Review">
                    <input type="hidden" name="reviewId" value="<?= $review->getId(); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/_footer.php';
?>
