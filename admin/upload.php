<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Image</title>
</head>
<body>
  <h1>Upload an Image</h1>
  <form action="upload_handler.php" method="post" enctype="multipart/form-data">
    <label for="image">Choose image to upload:</label><br>
    <input type="file" name="image" id="image" accept="image/*" required><br><br>
    <button type="submit">Upload</button>
  </form>
</body>
</html>
