<?php
$id = $_GET['id'] ?? null;
$posts_file = __DIR__ . "/data/topics/$id.txt";
if (!$id || !file_exists($posts_file)) die("Тема не знайдена");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    if ($name && $message) {
        $date = date("d.m.Y H:i");
        file_put_contents($posts_file,"$date|$name|$message\n", FILE_APPEND);
        header("Location: topic.php?id=$id");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Написати пост</title>
<style>
body { font-family:'Segoe UI', Tahoma, Geneva, Verdana,sans-serif; background:#f4f6f8; margin:0; padding:0; }
.container { max-width:700px; margin:40px auto; padding:30px 40px; background:#fff; border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,0.1);}
h2 { text-align:center;}
input[type=text],textarea { width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; margin-bottom:15px; transition:0.3s;}
input[type=text]:focus,textarea:focus { border-color:#007BFF; outline:none; box-shadow:0 0 8px rgba(0,123,255,0.2);}
button { padding:12px 20px; background:#007BFF; color:#fff; border:none; border-radius:8px; cursor:pointer; transition:0.3s;}
button:hover { background:#0056b3;}
</style>
</head>
<body>
<div class="container">
<h2>Написати пост</h2>
<form method="POST">
Ім'я:<br>
<input type="text" name="name" required><br>
Повідомлення:<br>
<textarea name="message" rows="4" required></textarea><br>
<button type="submit">Відправити</button>
</form>
</div>
</body>
</html>