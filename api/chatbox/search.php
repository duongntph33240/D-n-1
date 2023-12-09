<?php

include_once "../../controllers/ChatBoxControllerAPI.php";
$users = new ChatBoxControllerAPI();
$searchTerm = $_POST['searchTerm'];
$users->Search($searchTerm);
