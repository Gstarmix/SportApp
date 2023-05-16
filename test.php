<?php

$origin = date_create('2000-01-05');
$target = date_create();
$interval = date_diff($origin, $target);
echo $interval->format('%Y');