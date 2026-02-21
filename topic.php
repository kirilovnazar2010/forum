<?php
$id = $_GET['id'] ?? null;
$posts_file = __DIR__ . "/data/topics/$id.txt";
if (!$id || !file_exists($posts_file)) die("Тема не знайдена");
$posts = file($posts_file, FILE_IGNORE_NEW_LINES);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Тема</title>
<style>
body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f4f6f8; margin:0; padding:0; }
.container { max-width: 800px; margin: 40px auto; padding: 30px 40px; background:#fff; border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,0.1);}
h2 { text-align:center; }
a { color:#007BFF; text-decoration:none;}
a:hover { text-decoration:underline;}
.message { background:#f1f3f5; padding:12px 15px; border-radius:10px; margin-bottom:10px; box-shadow:0 2px 5px rgba(0,0,0,0.05); transition:0.2s; }
.message:hover { background:#e9ecef; }
</style>
</head>
<body>
<div class="container">
<a href="index.php">Назад до списку тем</a>
<h2>Пости теми</h2>
<a href="post.php?id=<?php echo $id; ?>">Написати пост</a><br><br>

<?php if(empty($posts)) echo "Поки немає постів."; ?>
<?php foreach($posts as $post): ?>
    <?php list($date,$name,$message)=explode('|',$post); ?>
    <div class="message">
        <b><?php echo htmlspecialchars($name); ?></b> [<?php echo $date; ?>]:<br>
        <?php echo htmlspecialchars($message); ?>
    </div>
<?php endforeach; ?>
</div>
</body>
</html>