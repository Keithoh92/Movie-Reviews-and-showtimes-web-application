<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 400px;">
    <h1 class="text-center">Error</h1>
</div>
<div class="p-3 mb-2 bg-danger text-white">
    <p>the following errors occurred:</p>
        <br>
<?php
foreach($errors as $error){
    print "- $error <br>";
}
?>
</div>
<?php
require_once __DIR__ . '/_footer.php';
?>