<?php
require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();

$user = changeRole(request()->get('userId'), request()->get('roleId'));
if ($user['role_id'] == 1) {
  $session->getFlashBag()->add('success', $user['username'] . ' promoted to admin!');
} elseif ($user['role_id'] == 2) {
  $session->getFlashBag()->add('success', $user['username'] . ' demoted to restricted user');
} elseif ($user['role_id'] == 3) {
  deleteUser($user['username']);
  $session->getFlashBag()->add('success', $user['username'] . ' deleted from database');
}
redirect('../admin.php');