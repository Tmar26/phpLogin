<div class="media well">
  <div class="media-body">
    <h4 class="media-heading"><?php echo $dvd['name']; ?></h4>
    <p><?php echo $dvd['description']; ?>
      <?php if ($dvd['image'] != NULL) : ?>
        <?php echo '<img src="' . "../" . $dvd['image'] . '" alt="error" align="right" width="200" height="200">' ?>
      <?php endif; ?></p>
  </div>
</div>