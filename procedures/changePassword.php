<?php
require_once __DIR__ . '/../inc/bootstrap.php';
requireAuth();

$currentPassword = request()->get('current_password');
$newPassword = request()->get('password');
$confirmPassword = request()->get('confirm_password');

if ($newPassword != $confirmPassword) {
  $session->getFlashBag()->add('error', 'new passwords do not match try again');
  redirect('../account.php');
}
$user = getAuthenticatedUser();

if (empty($user)) {
  $session->getFlashBag()->add('error', 'Some error happened, try again');
  redirect('../account.php');
}
if (!password_verify($currentPassword, $user['password'])) {
  $session->getFlashBag()->add('error', 'current password is incorrect try again');
  redirect('../account.php');
}
$hashed = password_hash($newPassword, PASSWORD_DEFAULT);

if (!updatePassword($hashed, $user['id'])) {
  $session->getFlashBag()->add('error', 'could not update passwrod try again');
  redirect('../account.php');
}
$session->getFlashBag()->add('success', 'password updated');
redirect('../account.php');