<?php

require 'page.php';

$content = '';

$content .= '
<div class="form-group container col-sm-4" id="inputFields">
    <form action="collatz.php" method="GET">
        <input type="number" class="form-control" id="number" name="number" placeholder="Number:">
        <small id="collatzHelp" class="form-text text-muted">Please enter a positive integer</small>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<hr>
';

function collatz($number) {
    $steps = 0;
    $max = $number;

    while ($number > 1) {
        if ($number > $max) {
            $max = $number;
        }    
        if ($number % 2 == 0) {
            $number = $number / 2;
            $steps++;
        } else {
            $number = (3 * $number) + 1;
            $steps++;
        }
    }

    return [
        "steps" => $steps,
        "max" => $max
    ];
}

if (isset($_GET['number'])) {
    $user_input = filter_var($_GET['number'], FILTER_SANITIZE_NUMBER_INT);
    
    if (isset($_GET['all'])) {
        for ($i = 1; $i <= $user_input; $i++) {
            $content .= 'Collatz of '.$i.' is: '.collatz($i)['steps'].'<br>';
        }
    } else {
        $result = collatz($user_input);

        $output = 'Number of steps: '.$result['steps'].'<br>Max number reached: '.$result['max'];
        $content .= $output;
    }
}

$o_collatz_page = new Page();
$collatz_html = $o_collatz_page->create_page('Collatz', $content);
echo $collatz_html;