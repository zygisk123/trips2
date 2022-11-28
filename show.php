<?php
session_start();
include "./routes.php";

$old = false;
if (isset($_SESSION['POST'])) {
    if (count($_SESSION['POST']) != 0) {
        $old = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Trips</title>
</head>

<?php
if(isset($_SESSION['errors'])){
    foreach ($_SESSION['errors'] as $error) {?>
        <div class="alert alert-danger" role="alert">
            <?=$error?>
        </div>
        <?php 
    }
    $_SESSION['errors'] = [];
}
?>

<body>
<?php
    include "./elements/navbar.php";
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1><?=($old)? $_SESSION['POST']['month']:$trip->month?></h1>
                <h3>Distance: <?=($old)? $_SESSION['POST']['distance']:$trip->distance?> km</h3>
                <h3>Max people allowed: <?=($old)? $_SESSION['POST']['maxPeople']:$trip->maxPeople?></h3>
                <h3>Participants:</h3>
                <ul>
                    <?php foreach ($participants as $key => $participant) { ?>
                        <li><?php echo "$participant->name $participant->surname"?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1>Register</h1>
                <form action="" method="post">
                    <div class="form-group mt-2">
                        <label for="registerName">Name</label>
                        <input value="<?=($old)? $_SESSION['POST']['participantName'] : "" ?>" class="form-control" type="text" id="registerName" name = "participantName">
                    </div>
                    <div class="form-group mt-2">
                        <label for="registerSurname">Surname</label>
                        <input value="<?=($old)? $_SESSION['POST']['participantSurname'] : "" ?>" class="form-control" type="text" id="registerSurname" name = "participantSurname">
                    </div>
                    <input type="hidden" name="regTripID" value="<?=$trip->id?>">
                    <input type="hidden" name="distance" value="<?=$trip->distance?>">
                    <input type="hidden" name="month" value="<?=$trip->month?>">
                    <input type="hidden" name="maxPeople" value="<?=$trip->maxPeople?>">

                    <button type="submit" class="btn btn-primary mt-2" name="registerParticipant">Register</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>