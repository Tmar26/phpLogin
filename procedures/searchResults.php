<?php

require_once __DIR__ . '/../inc/bootstrap.php';
require_once __DIR__ . '/../templates/header.php';
//require_once __DIR__ . '/../templates/nav.php';
if ($_POST['searchTitle'] != NULL) {
  foreach (searchResults($_POST['searchTitle']) as $dvd) {
    include __DIR__ . '/../templates/search.php';
  }
} else {
  redirect('../dvds.php');
}

?>
    <form method="post" action="../dvds.php">
        <input type="submit" value="GO BACK TO DVD LIST" name="returnToList">
    </form>
<?php require_once __DIR__ . '/../templates/footer.php';
