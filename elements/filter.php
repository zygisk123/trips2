<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="" method="get">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <select name = "filterByMonth" id="filterMonth" class="form-select" aria-label="Default select example">
                                <option value = "" selected>Month</option>
                                <?php foreach ($months as $month) { ?>
                                    <option value = <?=$month?>><?=$month?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select name = "filterByPatricipants" class="form-select" aria-label="Default select example">
                                <option value = "" selected>Participants</option>
                                <?php for($i = 1; $i <=50 ; $i++) { ?>
                                    <option value = <?=$i?>><?=$i?></option>
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
                            <input type="checkbox" value="1" class="form-check-input" name = "findWithAnimals" id="findwithAnimals">
                            <label class="form-check-label" for="findwithAnimals">With Animals</label>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary" name="filter">Filter</button>
                    </div>
                    <div class="col-4"></div>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>