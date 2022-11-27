
<div class="container">
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trips as $key => $trip) { ?>
                        <tr>
                            <td><?=$trip->month?></td>
                            <td><?=$trip->distance?></td>
                            <td><?=$trip->maxPeople?></td>
                            <td><?=($trip->withPets)?"Yes":"No"?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>