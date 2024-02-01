<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>👩‍💻 Свой сайт каждому.</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body >
<main class="main">
<section class="section section-qestion " >
            <div class="questions">

<?php

$name = $_POST['name'];
$tel = $_POST['tel'];
$coment = $_POST['coment'];

$name = htmlspecialchars($name); //функция преобразует все символы, которые пользователь попытается добавить в форму:
$tel = htmlspecialchars($tel);
$coment=htmlspecialchars($coment);

$name = urldecode($name); //функция декодирует url, если пользователь попытается его добавить в форму.
$tel = urldecode($tel);
$coment = urldecode($coment);

$name = trim($name); //функцией мы удалим пробелы с начала и конца строки, если таковые имеются
$tel = trim($tel);
$coment = trim($coment);

$token = "6011210753:AAFrXiOAOFTHruFJS8QnrzgmedC-IWUeSQc";
$chat_id = "483909447";

$arr = array(
  'САЙТ нужен: ' => $name,
  'Телефон: ' => $tel,
  'комент' => $coment

);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  echo $name."<h1> Сообщение отправлено! </h1> <br> 
    <h2>Я Вам скоро отвечу </h2><br>
    <h3><a href='index.html'>Вернуться на сайт</a></h3>";
} else {
  echo "при отправке сообщения возникли ошибки";
}
?>
            </div>
        </section>
</main>

</body>
</html>