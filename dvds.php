<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?>

    <div class="container">
        <div class="well">
            <h2>DVD List</h2>
            <form method="post" action="procedures/searchResults.php"><input type="text" placeholder="Search Titles">
                <input type="submit" value="SEARCH" name="search">
            </form>
          <?php
          foreach (getAllDvds() as $dvd) {
            include __DIR__ . '/templates/dvd.php';
          }
          ?>

        </div>
    </div>
<?php
require_once __DIR__ . '/templates/footer.php';
