<?php
require_once __DIR__ . '/../inc/bootstrap.php';
requireAuth();

$dvd = getDvd(request()->get('dvdId'));
if (!isAdmin() && !isOwner($dvd['owner_id'])) {
  $session->getFlashBag()->add('error', 'not authorized');
  redirect('../dvds.php');
}

$dvdTitle = request()->get('title');
$dvdDescription = request()->get('description');

if (updateDvd($dvd['id'], $dvdTitle, $dvdDescription)) {
  $session->getFlashBag()->add('success', 'DVD Updated');
  redirect('../dvds.php');
} else {
  $session->getFlashBag()->add('error', 'Unable to Update DVD');
  redirect('edit.php?dvdId=' . $dvd['id']);
}