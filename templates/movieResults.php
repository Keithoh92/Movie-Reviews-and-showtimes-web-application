<?php
require_once __DIR__ . '/_header.php';
use TuDublin\CinemaRepository;
use TuDublin\MovieRepository;
?>
<div class="mx-auto" style="width: 600px;">
    <h1 class="text-center">Movie Search Results</h1>
</div>
<?php
require_once __DIR__ . '/_movieSearchBar.php';
?>
<table class="table table-striped table-dark">
        <tr class="text-warning">
            <th> Location </th>
            <th> Movie </th>
            <th> Cinema </th>
            <th> Genre </th>
            <th> Rating </th>
            <th> Date </th>
            <th> Time </th>
        </tr>
<?php
foreach ($showTimeResults as $showTime):
?>
    <tr>
        <td> <?= $showTime['location'] ?> </td>
        <td> <?= $showTime['title'] ?> </td>
        <td> <?= $showTime['name'] ?> </td>
        <td> <?= $showTime['genre'] ?> </td>
        <td class="text-warning">
            <?php
            for ($i = 0; $i < $showTime['rating']; $i++):
                ?>
                <i class="fas fa-star"></i>
            <?php
            endfor;
            ?>
        </td>
        <td> <?= $showTime['date'] ?> </td>
        <td> <?= $showTime['time'] ?> </td>
    </tr>
<?php
endforeach;
?>
    </table>
<?php
require_once __DIR__ . '/_footer.php';
?>
