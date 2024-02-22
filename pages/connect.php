<?php 
try {
$conn = new PDO("mysql:host=127.0.0.1;port=3308;dbname=php94", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully"."<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}