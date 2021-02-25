<form class="form-inline">
    <div class="form-group">
        <div class="form-group mx-2">
            <label for="location" class="font-weight-bold">Location</label>
        </div>
        <select class="form-control" name="location" id="location">
            <option value="">All</option>
            <?php
            foreach ($cinemas as $cinema):
                ?>
                <option value="<?= $cinema->getLocation(); ?>"><?= $cinema->getLocation(); ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <div class="form-group mx-2">
            <label for="cinema" class="font-weight-bold">Cinema</label>
        </div>
        <select class="form-control" name="cinema" id="cinema">
            <option value="">All</option>
            <?php
            foreach ($cinemas as $cinema):
                ?>
                <option value="<?= $cinema->getId(); ?>"><?= $cinema->getName(); ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <div class="form-group mx-2">
            <label for="movie" class="font-weight-bold">Movie</label>
        </div>
        <select class="form-control" name="movie" id="movie">
            <option value="">All</option>
            <?php
            foreach ($movies as $movie):
                ?>
                <option value="<?= $movie->getId(); ?>"><?= $movie->getTitle(); ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <div class="btn-toolbar mx-2">
            <input class="btn btn-info" type="submit" name="action" value="Search Movies">
        </div>
        <div class="btn-toolbar mx-2">
            <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Advanced Search</button>
        </div>
    </div>
<!--------------------- advanced search  -------------------------->
    <span class="collapse" id="collapseExample">
        <span class="form-group">

            <div class="form-group mx-2">
                <label for="genre" class="font-weight-bold">Genre</label>
            </div>
            <select class="form-control" name="genre" id="genre">
                <option value="">All</option>
                <?php
                foreach ($movies as $movie):
                    ?>
                    <option value="<?= $movie->getGenre(); ?>"><?= $movie->getGenre(); ?></option>
                <?php
                endforeach;
                ?>
            </select>
            <div class="form-group mx-2">
                <label for="rating" class="font-weight-bold">Rating</label>
            </div>
            <select class="form-control" name="rating" id="rating">
                <option value="">All</option>
                <option value="1">1 star</option>
                <option value="2">2 stars</option>
                <option value="3">3 stars</option>
                <option value="4">4 stars</option>
                <option value="5">5 stars</option>
            </select>
            <div class="form-group mx-2">
                <label for="startTime" class="font-weight-bold">Start Time</label>
            </div>
            <select class="form-control" name="startTime" id="startTime">
                <option value="">All</option>
                <option value="12">12-1pm</option>
                <option value="13">1-2pm</option>
                <option value="14">2-3pm</option>
                <option value="15">3-4pm</option>
                <option value="16">4-5pm</option>
                <option value="17">5-6pm</option>
                <option value="18">6-7pm</option>
                <option value="19">7-8pm</option>
                <option value="20">8-9pm</option>
                <option value="21">9-10pm</option>
                <option value="22">10-11pm</option>
            </select>
         </span>
    </span>
</form>
<p>
</p>



