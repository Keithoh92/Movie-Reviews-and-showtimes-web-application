<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">All Cinemas</h1>
</div>
<p>
    <div style="overflow-y:auto;">
    <table class="table table-striped table-dark">
        <tr class="text-warning">
            <th> ID </th>
            <th> Location </th>
            <th> Name </th>
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
foreach ($cinemas as $cinema):
?>

        <tr>
            <td><?= $cinema->getId(); ?></td>
            <td><?= $cinema->getLocation(); ?></td>
            <td><?= $cinema->getName(); ?></td>
<?php
if ($username == 'admin'):
    ?>
    <td><a href="index.php?action=editCinemaForm&cinemaId=<?= $cinema->getId(); ?>">Edit</a></td>
    <td><a href="index.php?action=deleteCinema&cinemaId=<?= $cinema->getId(); ?>">Delete</a></td>
<?php
endif;
?>
        </tr>

<?php
endforeach;
?>
    </table>
    </div>
<?php
require_once __DIR__ . '/_footer.php';
?>
