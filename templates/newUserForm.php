<?php
require_once __DIR__ . '/_header.php';
?>
<div class="mx-auto" style="width: 600px;">
    <h1 class="text-center">New User Registration</h1>
</div>
    <div class="container">
    <form class="form-horizontal" method="POST" action="index.php">
        <input type="hidden" name="action" value="processRegistration">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="username">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" minlength="4"
                           maxlength="45" title="4-45 characters" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="password1">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password1" minlength="4"
                           maxlength="45" title="4-45 characters" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="password2">Confirm Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password2" minlength="4"
                           maxlength="45" title="4-45 characters" required>
                </div>
            </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="email">E-mail:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" minlength="10" maxlength="45"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input class="btn btn-secondary" type="reset" name="reset" value="Reset">
                <input class="btn btn-info" type="submit" name="register" value="REGISTER">
            </div>
        </div>
    </form>
</div>
<hr>
<?php
require_once __DIR__ . '/_footer.php';
?>