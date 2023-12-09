<?php

include_once "../../controllers/ChatBoxControllerAPI.php";
$users = new ChatBoxControllerAPI();
$users->getusers();
