<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$dvd = getDvd(request()->get('dvdId'));

$dvdTitle = $dvd['name'];
$dvdDescription = $dvd['description'];
$buttonText = 'Update Dvd';
?>
    <div class="container">
        <div class="well">
            <h2>Update dvd</h2>

            <form class="form-horizontal" method="post" action="procedures/editDvd.php" enctype="multipart/form-data">
                <input type="hidden" name="dvdId" value="<?php echo $dvd['id']; ?>"/>
              <?php include_once __DIR__ . '/templates/dvdForm.php'; ?>
            </form>

        </div>
    </div>
<?php
require_once __DIR__ . '/templates/footer.php';
