<?php
$topics_file = "data/topics.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    if (!empty($title)) {
        $id = time();
        file_put_contents(__DIR__ . "/data/topics/$id.txt", "");
        file_put_contents($topics_file, "$id|$title\n", FILE_APPEND);
        header("Location: topic.php?id=$id");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Нова тема</title>
<style>
body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f8; margin:0; padding:0; }
.container { max-width: 700px; margin: 40px auto; padding: 30px 40px; background: #fff; border-radius:12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1);}
h2 { text-align: center; }
input[type=text] { width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; margin-bottom:15px; transition:0.3s; }
input[type=text]:focus { border-color:#007BFF; outline:none; box-shadow:0 0 8px rgba(0,123,255,0.2);}
button { padding:12px 20px; background:#007BFF; color:#fff; border:none; border-radius:8px; cursor:pointer; transition:0.3s;}
button:hover { background:#0056b3;}
</style>
</head>
<body>
<div class="container">
<h2>Створити нову тему</h2>
<form method="POST">
    Назва теми:<br>
    <input type="text" name="title" required><br>
    <button type="submit">Створити</button>
</form>
</div>
</body>
</html>