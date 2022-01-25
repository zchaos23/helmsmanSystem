<?php
$host = 'localhost:3307';
$name = "root";
$pawd = "root";
$base = "list";
$link = new mysqli($host, $name, $pawd, $base);

if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
