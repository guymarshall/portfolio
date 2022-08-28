<?php

require 'page.php';

$content = '';

$content .= '
<p>
    This is my website! It includes projects I have completed. Feel free to have a look around!
</p>
<p>
    If you have any suggestions for projects or change requests, visit my <a href="https://github.com/guymarshall">GitHub</a>, or <a href="mailto:guymarshall.c@gmail.com">email</a> me.
</p>';

$o_index_page = new Page();
$index_html = $o_index_page->create_page('Index', $content);
echo $index_html;