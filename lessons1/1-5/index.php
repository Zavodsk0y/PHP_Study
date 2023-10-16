<?php
$header = "<h1>Some header idk</h1>";
$content = "<h2>Article's header</h2><p>Article's text</p>";
$sidebar ="Tasks: <ul><li>Task 1</li><li>Task 2</li><li>Task 3</li></ul>";
$footer = "<p>Footer information</p>";

require __DIR__ . '/header.php';
require __DIR__ . '/sidebar.php';
require __DIR__ . '/content.php';
require __DIR__ . '/footer.php';