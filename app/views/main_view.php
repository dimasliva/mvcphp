<h1>Добро пожаловать!</h1>
<p>
    <img src="https://playside.gg/newsimage/1336_2c462a7a33.png" align="left" width="100">
    <a href="/">Dmitry Ermilov</a> - Он никуда не ходит, ведь его никуда не приглашают...
</p>
<?php
$pattern = "/Sch[a-z]ol/";
$string = "School is shit";

$result = preg_match($pattern, $string);
var_dump($result);
?>