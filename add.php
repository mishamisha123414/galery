<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=galery_db', 'root', '');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Get the image file
$image = $_FILES['url'];

// Check if the image was uploaded successfully
if ($image['error'] !== UPLOAD_ERR_OK) {
    echo 'Image upload failed.';
    exit;
}
// Get the image file name
$image_name = $image['name'];

// Get the image file extension
$image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

// Check if the image file extension is supported
$supported_extensions = array('jpg', 'jpeg', 'png', 'gif', 'jfif');
if (!in_array($image_extension, $supported_extensions)) {
    echo 'Image file extension is not supported.';
    exit;
}

// Move the image file to the images directory
move_uploaded_file($image['tmp_name'], 'images/' . $image_name);

// Insert the image into the database
$sql = 'INSERT INTO images (title, url, descr, date, user_id, album_id) VALUES (?, ?, ?, ?, ?, ?)';
$stmt = $db->prepare($sql);
$stmt->execute(array(
    $_POST['title'],
    'images/' . $image_name,
    $_POST['descr'],
    date('Y-m-d'),
    $_POST['user_id'],
    $_POST['album_id']
));

// Check if the image was inserted successfully
if ($stmt->rowCount() !== 1) {
    echo 'Image insertion failed.';
    exit;
}
// Redirect to the gallery page
header('Location: /');
}
?>

<!-- HTML-форма для додавання зображення -->
<!DOCTYPE html>
<html>
<head>
    <title>Додати зображення</title>
</head>
<body>
    <h2>Додати зображення</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="title">Заголовок:</label>
        <input type="text" name="title" required><br><br>

        <label for="url">URL зображення:</label>
        <input type="file" name="url" required><br><br>

        <label for="descr">Опис:</label>
        <textarea name="descr" required></textarea><br><br>

        <label for="date">Дата:</label>
        <input type="date" name="date" required><br><br>

        <label for="user_id">ID користувача:</label>
        <input type="number" name="user_id" required><br><br>

        <label for="album_id">ID альбому:</label>
        <input type="number" name="album_id" required><br><br>

        <input type="submit" value="Додати зображення">
    </form>
</body>
</html>