<?php require_once("../php/functions.php");
if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) { die('File upload error.'); }
$fileTmpPath = $_FILES['image']['tmp_name'];
$fileName    = basename($_FILES['image']['name']);
$fileMime    = mime_content_type($fileTmpPath);
$fileData    = file_get_contents($fileTmpPath);
try {
  $stmt = $pdo->prepare("
      INSERT INTO images (name, mime, data)
      VALUES (:name, :mime, :data)
  ");
  $stmt->bindParam(':name', $fileName);
  $stmt->bindParam(':mime', $fileMime);
  $stmt->bindParam(':data', $fileData, PDO::PARAM_LOB);
  $stmt->execute();
  echo "Upload successful! <a href='gallery.php'>View Gallery</a>
  <p><a href="upload.php">Upload another image</a></p>";
} catch (PDOException $e) { die("DB error: " . $e->getMessage()); }
