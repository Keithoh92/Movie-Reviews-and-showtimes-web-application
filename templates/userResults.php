<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 600px;">
    <h1 class="text-center">All Users</h1>
</div>
    <table class="table table-striped table-dark">
        <tr class="text-warning">
            <th> ID </th>
            <th> Username </th>
            <th> type </th>
            <th> E-mail </th>
<?php
//use TuDublin\SessionManager;
//$sessionManager = new SessionManager();
//$isLoggedIn = $sessionManager->isLoggedIn();
//$username = $sessionManager->usernameFromSession();
if ($username == 'admin'):
?>
            <th> &nbsp; </th>
<?php
endif;
 ?>
        </tr>

<?php
foreach ($users as $user):
?>
        <tr>
            <td><?= $user->getId(); ?></td>
            <td><?= $user->getUsername(); ?></td>
            <td><?= $user->getType(); ?></td>
            <td><?= $user->getEmail(); ?></td>
<?php
if ($username == 'admin'):
?>
            <td><a href="index.php?action=deleteUser&userId=<?=$user->getId();?>">Delete</a></td>
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
