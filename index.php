<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подсчет количества слов в строке</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 20px;
        }

        pre {
            font-family: "Courier New", Courier, monospace;
            white-space: pre-wrap;
            word-wrap: break-word;
            text-align: center;
            margin: 20px auto;
        }

        .form-container {
            margin-bottom: 20px;
        }

        .triangle {
            white-space: pre;
            font-family: monospace;
            font-size: 16px;
            line-height: 1.5;
            margin-top: 20px;
        }

        input[type="number"] {
            padding: 5px;
            font-size: 16px;
        }

        button {
            padding: 6px 12px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Подсчет количества слов в строке</h1>

<div class="form-container">
    <form method="POST" action="index.php">
        <label for="n">Введите строку: </label>
        <textarea id="string" name="string" rows="5" cols="50" required></textarea>
        <button type="submit">Посчитать</button>
    </form>
</div>

<?php
require_once 'autoload.php';

use WordCounter\WordCounter;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['string']) && is_string($_POST['string'])) {
    $counter = WordCounter::make($_POST['string'])->count();
    foreach ($counter->getWords() as $word => $count) {
        echo "$word - $count<br>";
    }
}
?>

</body>
</html>