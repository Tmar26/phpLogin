<?php
require_once __DIR__ . '/../inc/bootstrap.php';
requireAuth();
$path = '../';
$dvd = getDvd(request()->get('dvdId'));
$filename = $dvd['image'];
if (!isAdmin() && !isOwner($dvd['owner_id'])) {
  $session->getFlashBag()->add('error', 'not authorized');
  redirect('../dvds.php');
}
//removes the dvd entry from the db and removes the image from the uploads folder
if (deleteDvd($dvd['id']) && unlink($path . $filename)) {
  $session->getFlashBag()->add('success', 'DVD Deleted');
} else {
  $session->getFlashBag()->add('error', 'Unable to delete DVD');
}
redirect('../dvds.php');



