<p>Required insulin: <?php calculate_required_insulin($carbs_per_100, $grams_on_scale, $insulin_ratio); ?></p>

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
