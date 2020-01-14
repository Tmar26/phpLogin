<?php
require_once __DIR__ . '/../inc/bootstrap.php';
requireAuth();

$dvd = getDvd(request()->get('dvdId'));
if (!isAdmin() && !isOwner($dvd['owner_id'])) {
  $session->getFlashBag()->add('error', 'not authorized');
  redirect('../dvds.php');
}

if (deleteDvd($dvd['id'])) {
  $session->getFlashBag()->add('success', 'DVD Deleted');
} else {
  $session->getFlashBag()->add('error', 'Unable to Delete DVD');
}
redirect('../dvds.php');