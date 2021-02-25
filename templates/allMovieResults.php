<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">All Movies</h1>
</div>
<table class="table table-striped table-dark">
    <tr class="text-warning">
        <th> ID </th>
        <th> Title </th>
        <th> Genre </th>
        <th> Classification </th>
        <th> Rating </th>
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
    foreach ($movies as $movie):
        ?>
        <tr>
            <td><?= $movie->getId(); ?></td>
            <td><?= $movie->getTitle(); ?></td>
            <td><?= $movie->getGenre(); ?></td>
            <td><?= $movie->getClassification(); ?></td>
            <td class="text-warning">
                <?php
                for ($i = 0; $i < $movie->getRating(); $i++):
                    ?>
                    <i class="fas fa-star"></i>
                <?php
                endfor;
                ?>
            </td>
            <?php
            if ($username == 'admin'):
                ?>
                <td> <a href="index.php?action=editMovieForm&movieId=<?= $movie->getId(); ?>"> Edit
                    </a> </td>
                <td> <a href="index.php?action=deleteMovie&movieId=<?= $movie->getId(); ?>"> Delete </a> </td>
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

