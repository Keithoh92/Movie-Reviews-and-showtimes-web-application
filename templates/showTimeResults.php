<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">All Show Times</h1>
</div>
    <table class="table table-striped table-dark">
        <tr class="text-warning">
            <th> ID </th>
            <th> Cinema ID </th>
            <th> Movie ID </th>
            <th> Date </th>
            <th> Time </th>
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
foreach ($showTimes as $showTime):
?>
        <tr>
            <td><?= $showTime->getId() ?></td>
            <td><?= $showTime->getCinemaId() ?></td>
            <td><?= $showTime->getMovieId(); ?></td>
            <td><?= $showTime->getDate(); ?></td>
            <td><?= $showTime->getTime(); ?></td>
<?php
if ($username == 'admin'):
?>
            <td> <a href="index.php?action=editShowTimeForm&showTimeId=<?= $showTime->getId(); ?>">
                    Edit
                </a> </td>
            <td> <a href="index.php?action=deleteShowTime&showTimeId=<?= $showTime->getId(); ?>">
                    Delete </a> </td>
<?php
endif;
?>
        </tr>
<?php
endforeach;
?>
    </table>
<?php
require_once __DIR__ . '/_footer.php';
?>
