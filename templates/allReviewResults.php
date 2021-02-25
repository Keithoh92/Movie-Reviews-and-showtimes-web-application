<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">All Reviews</h1>
</div>
<table class="table table-striped table-dark">
    <tr class="text-warning">
        <th> ID </th>
        <th> Helpfulness </th>
        <th> Review Title </th>
        <th> Text </th>
        <th> User ID </th>
        <th> Movie ID </th>
        <?php
        if ($username == 'admin'):
            ?>
            <th> &nbsp; </th>
            <th> &nbsp; </th>
        <?php
        endif;
        ?>
    </tr>

    <?php
    foreach ($reviews as $review):
        ?>
        <tr>
            <td><?= $review->getId(); ?></td>
            <td class="text-warning">
                <?php
                for ($i = 0; $i < $review->getHelpfulness(); $i++):
                    ?>
                    <i class="fas fa-thumbs-up"></i>
                <?php
                endfor;
                ?>
            </td>
            <td><?= $review->getReviewTitle(); ?></td>
            <td><?= $review->getText(); ?></td>
            <td><?= $review->getUserId(); ?></td>
            <td><?= $review->getMovieId(); ?></td>
            <?php
            if ($username == 'admin'):
                ?>
                <td> <a href="index.php?action=editReviewForm&reviewId=<?= $review->getId(); ?>">
                        Edit
                    </a> </td>
                <td> <a href="index.php?action=deleteReview&reviewId=<?= $review->getId(); ?>">
                        Delete </a> </td>
            <?php
            endif;
            ?>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<hr>
<?php
require_once __DIR__ . '/_footer.php';
?>


