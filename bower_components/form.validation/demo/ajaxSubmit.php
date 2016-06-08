<?php

$userName = $_POST['username'];

echo json_encode([
    'message' => sprintf('Welcome %s', $userName),
]);
