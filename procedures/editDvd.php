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
$target_dir = '../uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Allow certain file formats
$extensions = array("jpeg", "jpg", "png", "gif");

if (in_array($imageFileType, $extensions) === false) {
  $session->getFlashBag()->add('error', ' Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
  $uploadOk = 0;
  redirect('../edit.php');
}

if (updateDvd($dvd['id'], $dvdTitle, $dvdDescription,
    'uploads/' . basename($_FILES['fileToUpload']['name']))&& $uploadOk == 1) {
  $session->getFlashBag()->add('success', 'DVD Updated');
  redirect('../dvds.php');
} else {
  $session->getFlashBag()->add('error', 'Unable to Update DVD');
  redirect('edit.php?dvdId=' . $dvd['id']);
}