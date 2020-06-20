<?php
include "api/api.php";
unset($_SESSION['user_id']);
unset($_SESSION['user_type']);
redirect("./");