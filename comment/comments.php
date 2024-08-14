<?php
include 'koneksi.php';

// method GET request untuk comment
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = $pdo->query('SELECT * FROM comments ORDER BY created_at DESC');
    $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($comments);
}

//  method post add komen anyar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d H:i:s');
    
    $stmt = $pdo->prepare('INSERT INTO comments (name, comment, created_at) VALUES (?, ?, ?)');
    $stmt->execute([$name, $comment, $date]);
    
    echo json_encode([
        'name' => $name,
        'comment' => $comment,
        'created_at' => $date
    ]);
}
?>
