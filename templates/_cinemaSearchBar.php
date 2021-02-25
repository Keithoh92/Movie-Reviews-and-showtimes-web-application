<form>
        <span class="label">
            <label for="location">Location</label>
        </span>
    <select name="location" id="location">
        <option value="*">All</option>
<?php
foreach ($cinemas as $cinema):
?>
            <option value="<?= $cinema->getLocation(); ?>"><?= $cinema->getLocation(); ?></option>
<?php
endforeach;
?>
    </select>
    <span class="label">
            <label for="cinema">Cinema</label>
        </span>
    <select name="cinema" id="cinema">
        <option value="*">All</option>
<?php
foreach ($cinemas as $cinema):
?>
            <option value="<?= $cinema->getName(); ?>"><?= $cinema->getName(); ?></option>
<?php
endforeach;
?>
    </select>
    <span class="label">
            <label for="movie">Movie</label>
        </span>
    <select name="movie" id="movie">
        <option value="*">All</option>
<?php
foreach ($movies as $movie):
?>
            <option value="<?= $movie->getTitle(); ?>"><?= $movie->getTitle(); ?></option>
<?php
endforeach;
?>
    </select>
    <input type="submit" name="action" value="Search Movies">
    <input type="submit" name="action" value="Search Cinemas">
    <input type="submit" name="action" value="Search Show Times">
</form>