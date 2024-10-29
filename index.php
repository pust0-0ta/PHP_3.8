<?php

$dsn = "mysql:host=localhost;dbname=my_database";
$username = "root";
$password = "";
try {
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
die("Connection failed: " . $e->getMessage());
}

function getProductReviews($product) {
    $rewiews = [
        [
            'username' => 'Ivan',
            'rating' => 5,
            'review' => 'impressive!',
            'date' => '2024-10-1'
        ],
        [
            'username' => 'Irina',
            'rating' => 5,
            'review' => 'thank you very much!',
            'date' => '2024-10-18'    
        ],
        [
            'username' => 'Nikolay',
            'rating' => 4,
            'review' => 'not as expected',
            'date' => '2024-10-20'
        ]
        ];
        return $rewiews
}
$reviews = getProductReviews(1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $review = $_POST['review'];
    $rating = (int) $_POST['rating'];
    $sql = "INSERT INTO reviews (name, review, rating) VALUES (:name, :review,
    :rating)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'review' => $review, 'rating' => $rating]);
    echo "Отзыв успешно добавлен!";
    }

    foreach ($reviews as $review) {
        echo "Пользователь:" . $rewiew['username'] . "<br>";
        echo "Оценка:" . $rewiew['rating'] . "/5<br>";
        echo "Отзыв:" . $rewiew['review'] . "<br>";
        echo "Дата:" . $rewiew['date'] . "<br><br>";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $order_id = $_POST['order_id'];
        $reason = $_POST['reason'];
        $sql = "INSERT INTO cancellations (order_id, reason) VALUES (:order_id, :reason)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['order_id' => $order_id, 'reason' => $reason]);
        echo "Заказ #$order_id успешно отменен!";
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
            $order_id = $_POST['order_id'];
            $user_id = $_POST['user_id'];
            $cancellation_reason = $_POST['cancellation_reason'];
            
            if (empty($order_id) || empty($user_id) || empty($cancellation_reason)) {
            die("All fields are required.");
            }
            
            $sql = "INSERT INTO order_cancellations (order_id, user_id, cancellation_reason)
            VALUES (:order_id, :user_id, :cancellation_reason)";
            try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
            ':order_id' => $order_id,
            ':user_id' => $user_id,
            ':cancellation_reason' => $cancellation_reason]);
            echo "Order cancellation saved successfully!";
            } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
            }
            ?>