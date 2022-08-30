<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insulin Calculator</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="carbsPer100">Carbohydrate per 100g:</label>
        <br>
        <input type="number" id="carbsPer100" name="carbsPer100" step="0.1" autocomplete="nope" min="0">
        <br>
        <label for="gramsOnScale">Grams on scale</label>
        <br>
        <input type="number" id="gramsOnScale" name="gramsOnScale" step="0.1" autocomplete="nope" min="0">
        <br>
        <label for="insulinRatio">Insulin ratio (insulin per 10g carbohydrate)</label>
        <br>
        <input type="number" id="insulinRatio" name="insulinRatio" step="0.1" autocomplete="nope" min="0">
        <br>
        <br>
        <button type="submit">Calculate</button>
    </form>
    <?php if (isset($_POST['carbsPer100']) && isset($_POST['gramsOnScale']) && isset($_POST['insulinRatio'])): ?>
        <hr>
        <p>Required insulin: <?php calculate_required_insulin($carbs_per_100, $grams_on_scale, $insulin_ratio); ?></p>
        <hr>
    <?php endif; ?>
</body>
</html>

<?php

$carbs_per_100 = isset($_POST['carbsPer100']) ? filter_var($_POST['carbsPer100'], FILTER_SANITIZE_NUMBER_FLOAT) : NULL;
$grams_on_scale = isset($_POST['gramsOnScale']) ? filter_var($_POST['gramsOnScale'], FILTER_SANITIZE_NUMBER_FLOAT) : NULL;
$insulin_ratio = isset($_POST['insulinRatio']) ? filter_var($_POST['insulinRatio'], FILTER_SANITIZE_NUMBER_FLOAT) : NULL;

function calculate_required_insulin($carbs_per_100, $grams_on_scale, $insulin_ratio)
{
    // divide carbsPer100 by 100
    // multiply result by gramsOnScale
    // use insulinRatio with gramsOnScale to calculate insulinNeeded

    // print insulinNeeded

    $carbs_per_gram = $carbs_per_100 / 100;
    $total_grams_carbs = $carbs_per_gram * $grams_on_scale;

    $insulin_needed = ($total_grams_carbs / 10) * $insulin_ratio;
    return $insulin_needed;
}
