<div class="media well">
    <div class="media-body">
        <h4 class="media-heading"><?php echo $dvd['name']; ?></h4>
        <p>DVD ID = <?php echo $dvd['id']; ?></p>
        <p><?php echo $dvd['description']; ?>
          <?php if ($dvd['image'] != NULL) : ?>
            <?php echo '<img src="' . $dvd['image'] . '" alt="error" align="right" width="200" height="200">' ?>
          <?php endif; ?></p>
      <?php if (isAdmin() || isOwner($dvd['owner_id'])) : ?>
          <p>
              <span><a href="edit.php?dvdId=<?php echo $dvd['id']; ?>">Edit</a> | </span>
              <span><a href="procedures/deleteDvd.php?dvdId=<?php echo $dvd['id']; ?>">Delete</a></span>
          </p>
      <?php endif; ?>
    </div>
</div>