<?php

require 'page.php';

$content = '';

$content .= 'This is the privacy page. Nothing to put yet!';

$o_privacy_page = new Page();
$privacy_html = $o_privacy_page->create_page('Privacy', $content);
echo $privacy_html;
