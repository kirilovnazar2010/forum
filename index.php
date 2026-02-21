<?php
$topics_file = "data/topics.txt";
$topics = file_exists($topics_file) ? file($topics_file, FILE_IGNORE_NEW_LINES) : [];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Форум</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f8;
    color: #333;
    margin: 0;
    padding: 0;
}
.container {
    max-width: 800px;
    margin: 40px auto;
    padding: 30px 40px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}
h2 {
    text-align: center;
    color: #1a1a1a;
}
a {
    color: #007BFF;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
ul {
    list-style: none;
    padding: 0;
}
li {
    background: #f1f3f5;
    padding: 12px 15px;
    border-radius: 10px;
    margin-bottom: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    transition: 0.2s;
}
li:hover {
    background: #e9ecef;
}
button, input, textarea {
    font-family: inherit;
}
</style>
</head>
<body>
<div class="container">
<h2>Список тем</h2>
<a href="new_topic.php">Створити нову тему</a><br><br>

<ul>
<?php foreach ($topics as $line): 
    list($id, $title) = explode('|', $line); ?>
    <li><a href="topic.php?id=<?php echo $id; ?>"><?php echo htmlspecialchars($title); ?></a></li>
<?php endforeach; ?>
</ul>
</div>
</body>
</html>