<div class="container mt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Filter</h1>
            <form action="" method="get">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <select name = "filterByMonth" id="filterMonth" class="form-select" aria-label="Default select example">
                                <option value = "" selected>Month</option>
                                <?php foreach ($months as $month) { ?>
                                    <option <?=(isset($_GET["filterByMonth"]))?($_GET["filterByMonth"] == $month) ? "selected" : '':'';?>  value = <?=$month?>><?=$month?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select name = "filterByPatricipants" class="form-select" aria-label="Default select example">
                                <option value = "" selected>Participants</option>
                                <?php for($i = 1; $i <=50 ; $i++) { ?>
                                    <option <?=(isset($_GET["filterByPatricipants"]))?($_GET["filterByPatricipants"] == $i) ? "selected" : '':'';?> value = <?=$i?>><?=$i?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-select" name = "sort">
                                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 0) ? "selected" : '':'';?> selected value="0">Order By</option>
                                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 1) ? "selected" : '':'';?> value="1">Distance 0-9</option>
                                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 2) ? "selected" : '':'';?>value="2">Distance 9-0</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="form-check">
                            <input <?=(isset($_GET["findWithAnimals"]))?($_GET["findWithAnimals"] > 0) ? "checked" : '':'';?> type="checkbox" class="form-check-input mt-2" name = "findWithAnimals" id="findwithAnimals">
                            <label class="form-check-label mt-2" for="findwithAnimals">With Animals</label>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary mt-2" name="filter">Filter</button>
                    </div>
                    <div class="col-4"></div>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>