<?php

$mysqli = new mysqli("db", "root", "root", "2021sportverein");

$result = $mysqli->query("SELECT personengruppe FROM grundbeitrag");


var_dump($result->fetch_all());