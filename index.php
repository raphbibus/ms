<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/RebifDose.php';

use Carbon\Carbon;
use Rebif\RebifDose;

$rebifDose = new RebifDose(new Carbon("11/24/2019"));

?>

<!DOCTYPE html>
<html lang="de_DE">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>When to rebif?!</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="styles.css" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md" id="position">
                    <?php echo $rebifDose->getNextDoseDue() ?>
                </div>
            </div>
        </div>
    </body>
</html>
