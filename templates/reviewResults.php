<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">Review Results</h1>
</div>
<?php
require_once __DIR__ . '/_reviewSearchBar.php';
?>

            <table class="table table-striped table-dark">
                <tr class="text-warning">
                    <th> Movie </th>
                    <th> Genre</th>
                    <th> Classification </th>
                    <th> Movie Rating </th>
                    <th> Review Title </th>
                    <th> Reviewer </th>
                    <th> Helpfulness </th>
                    <th> &nbsp </th>
                </tr>

<?php
foreach ($reviewResults as $reviewResult):
?>
                <tr>
                    <td><?= $reviewResult['title']; ?></td>
                    <td><?= $reviewResult['genre']; ?></td>
                    <td><?= $reviewResult['classification']; ?></td>
                    <td class="text-warning">
                        <?php
                        for ($i = 0; $i < $reviewResult['rating']; $i++):
                            ?>
                            <i class="fas fa-star"></i>
                        <?php
                        endfor;
                        ?>
                    </td>
                    <td><?= $reviewResult['reviewTitle']; ?></td>
                    <td><?= $reviewResult['username']; ?></td>
                    <td class="text-warning">
                        <?php
                        for ($i = 0; $i < $reviewResult['helpfulness']; $i++):
                        ?>
                            <i class="fas fa-thumbs-up"></i>
                        <?php
                        endfor;
                        ?>
                    </td>
                    <td>
                        <a href="/index.php?action=readReview&reviewId=<?= $reviewResult[5];
                        ?>&movieTitle=<?=$reviewResult['title'];?>">Read</a>
                    </td>
                </tr>
<?php
endforeach;
?>
            </table>
<?php
require_once __DIR__ . '/_footer.php';
?>