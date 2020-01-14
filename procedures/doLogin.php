<?php
require_once __DIR__ . '/../inc/bootstrap.php';

$user = findUserByUsername(request()->get('username'));

if (empty($user)) {
  $session->getFlashBag()->add('error', 'username was not found');
  redirect('../login.php');
}
if (!password_verify(request()->get('password'), $user['password'])) {
  $session->getFlashBag()->add('error', 'invalid password');
  redirect('../login.php');
}
saveUserSession($user);
redirect('../index.php');
