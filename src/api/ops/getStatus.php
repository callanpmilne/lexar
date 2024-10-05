<?php

/**
 * GET /api/status
 */

header("Content-Type: application/json;charset=utf-8");

echo json_encode([
  "Status" => "OK",
]);
