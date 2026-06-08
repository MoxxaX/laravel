<?php

putenv('APP_KEY=' . ($_SERVER['APP_KEY'] ?? $_ENV['APP_KEY'] ?? getenv('APP_KEY')));

require __DIR__ . '/../public/index.php';