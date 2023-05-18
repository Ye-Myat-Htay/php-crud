<?php

$db = mysqli_connect('localhost','root','','crud');

if(!$db) {
    die(mysqli_error($db));
}