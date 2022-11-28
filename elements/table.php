
<div class="container mt-5">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <td>Month</td>
                        <td>Distance</td>
                        <td>Max People Allowed</td>
                        <td>With Pets</td>
                        <td>Show</td>
                        <td>Edit</td>
                        <td>Remove</td>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trips as $key => $trip) { ?>
                        <tr href= "./show.php?tripID=".<?=$trip->id?>>
                            <td><?=$trip->month?></td>
                            <td><?=$trip->distance?></td>
                            <td><?=$trip->maxPeople?></td>
                            <td><?=($trip->withPets)?"Yes":"No"?></td>
                            <td>

                                <form action="./show.php" method="get">
                                    <input type="hidden" name="tripID" value="<?=$trip->id?>">
                                    <button type="submit" class="btn btn-primary" name = "showTrip">Show</button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value=" <?=$trip->id?>">
                                    <button type="submit" name="edit" class="btn btn-success">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value=" <?=$trip->id?>">
                                    <button type="submit" name="destroy" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>