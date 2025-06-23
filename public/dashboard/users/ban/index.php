<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/private/Actions/Dashboard/Moderation.php');
BanUser();