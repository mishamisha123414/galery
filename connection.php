<?php
$host = 'localhost'; // або IP-адреса сервера бази даних
$dbname = 'galery_db';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
/*try {
    // Настройте з'єднання з базою даних (код для підключення я не повторюватиму, оскільки він наведений у попередній відповіді)

    // Виконайте SQL запит для виведення всіх даних з таблиці "users"
    $query = "SELECT * FROM images";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Зараз змінна $result містить асоціативний масив з усіма даними з таблиці "users"

    // Виведіть дані на екран (або використовуйте їх для інших потреб)
    foreach ($result as $row) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Title: " . $row['title'] . "<br>";
        echo "Url: " . $row['url'] . "<br>";
        echo "Description: " . $row['descr'] . "<br>";
        echo "Date: " . $row['date'] . "<br>";
        echo "User: " . $row['user_id'] . "<br>";
        echo "Album: " . $row['album_id'] . "<br>";
        // інші поля таблиці, якщо вони є
        echo "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}*/
?>