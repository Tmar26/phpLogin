<?php

require_once __DIR__ . '/../inc/bootstrap.php';
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../templates/nav.php';

echo 'feature coming soon';

foreach (searchResults() as $dvd) {
  include __DIR__ . '/../templates/dvd.php';
}

require_once __DIR__ . '/../templates/footer.php';
