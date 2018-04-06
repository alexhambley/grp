<?php
$conn = new mysqli("localhost", "root", "", "g52grp");
if ($conn->connect_errno != 0)
  die('Failed to connect to the database.');
