<?php

require_once __DIR__ . '/../inc/bootstrap.php';
requireAuth();

$target_dir = '../uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

$dvdTitle = request()->get('title');
$dvdDescription = request()->get('description');

// Allow certain file formats
$extensions = array("jpeg", "jpg", "png", "gif");

if (in_array($imageFileType, $extensions) === false) {
  $session->getFlashBag()->add('error', ' Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
  $uploadOk = 0;
  redirect('../add.php');
}
if (copy($_FILES['fileToUpload']['tmp_name'], $target_file) &&
  addDvd($dvdTitle, $dvdDescription, $session->get('auth_user_id'), 'uploads/' . basename($_FILES['fileToUpload']['name']))
  && $uploadOk == 1) {
  $session->getFlashBag()->add('success', ' DVD Added');
  redirect('../dvds.php');

} else {
  $session->getFlashBag()->add('error', 'Unable to Add DVD');
  redirect('../add.php');
}