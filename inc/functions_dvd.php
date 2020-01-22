<?php
/*
 * Functions to interface with `dvds` table
 */
function getAllDvds()
{
  global $db;

  try {
    $query = "SELECT dvds.* "
      . " FROM dvds "
      . " ORDER BY name ASC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  } catch (\Exception $e) {
    throw $e;
  }
}

function searchResults($searchResults)
{
  global $db;
  $searchParameters = '%' . $searchResults . '%';
  try {
    $query = "SELECT * FROM dvds WHERE name LIKE  :search ";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':search', $searchParameters);
    $stmt->execute();
    return $stmt->fetchAll();
  } catch (\Exception $e) {
    throw $e;
  }
}

function getDvd($id)
{
  global $db;

  try {
    $query = "SELECT * FROM dvds WHERE id = :dvdId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':dvdId', $id);
    $stmt->execute();
    return $stmt->fetch();
  } catch (\Exception $e) {
    throw $e;
  }
}

//ADDED $image to addDvd
function addDvd($title, $description, $ownerId = null, $target_file)
{
  global $db;
  if (empty($ownerId)) {
    $ownerId = 0;
  }
  try {
    $query = "INSERT INTO dvds (name, description, owner_id,image) VALUES (:name, :description, :ownerId, :image)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':ownerId', $ownerId);
    $stmt->bindParam(':image', $target_file);
    return $stmt->execute();
  } catch (\Exception $e) {
    throw $e;
  }
}

function updateDvd($dvdId, $title, $description, $target_file)
{
  global $db;

  try {
    $query = "UPDATE dvds SET name=:name, description=:description,image=:image WHERE id=:dvdId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':dvdId', $dvdId);
    $stmt->bindParam(':image',$target_file);
    return $stmt->execute();
  } catch (\Exception $e) {
    throw $e;
  }
}

function deleteDvd($dvdId)
{
  global $db;

  try {
    $query = "DELETE FROM dvds WHERE id=:dvdId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':dvdId', $dvdId);
    return $stmt->execute();
  } catch (\Exception $e) {
    throw $e;
  }
}