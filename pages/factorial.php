<?php

require 'page.php';

$content = '';

$content .= '
<div class="form-group container col-sm-4" id="inputFields">
    <form action="factorial.php" method="GET">
        <input type="number" class="form-control" id="number" name="number" placeholder="Number:">
        <small id="factorialHelp" class="form-text text-muted">Please enter a positive integer less than 171</small>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<hr>
';

function factorial($user_input) {
    $result = 1;

    if ($user_input > 1) {
        for ($i = 2; $i <= $user_input; $i++) {
            $result = $result * $i;
        }
    } else {
        $result = -1;
    }

    return $result;
}

if (isset($_GET['number'])) {
    $user_input = filter_var($_GET['number'], FILTER_SANITIZE_NUMBER_INT);

    $result = factorial($user_input);

    $output = 'Factorial of '.$user_input.': '.$result;
    $content .= $output;
}

$o_factorial_page = new Page();
$factorial_html = $o_factorial_page->create_page('Factorial', $content);
echo $factorial_html;