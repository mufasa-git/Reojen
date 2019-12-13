<?php
    $connection =new mysqli("localhost", "user", "pass", "db_name"); // Establishing Connection with Server
    $db = mysqli_select_db($connection, "db_name");
    if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
