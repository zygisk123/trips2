<div class="container mt-5">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <h1>Create new trip</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="tripMonth">Month</label>
                    <select name = "month" class="form-select" aria-label="Default select example">
                        <option value = "" selected>Month</option>
                        <?php foreach ($months as $month) { ?>
                            <option value = <?=$month?>><?=$month?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="tripDistance">Distance</label>
                    <input class="form-control" type="number" step = "1" id="tripDistance" name = "distance">
                </div>
                <div class="form-group mt-2">
                    <label for="maxPeople">Max People Allowed</label>
                    <input class="form-control" type="text" step = "1" id="maxPeople" name = "maxPeople">
                </div>
                <div class="form-check mt-2">
                    <input type="checkbox" value="1" class="form-check-input" name = "withAnimals" id="withAnimals">
                    <label class="form-check-label" for="withAnimals">With Animals</label>
                </div>
                <button type="submit" class="btn btn-primary mt-2" name="createNewTrip">Submit</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>