<?php
// объявление переменных
$name = "GeekBrains user";
echo "Hello, $name!";
echo "<br>";
define('MY_CONST', 100);
echo MY_CONST;

// Работа целых чисел
echo "<br>";
$int10 = 42;
$int2 = 0b101010;
$int8 = 052;
$int16 = 0x2A;
echo "Десятеричная система $int10 <br>";
echo "Двоичная система $int2 <br>";
echo "Восьмеричная система $int8 <br>";
echo "Шестнадцатеричная система $int16 <br>";

// Размер числа с плавающей точкой
$precise1 = 1.5;
$precise2 = 1.5e4;
$precise3 = 6E-8;
echo "$precise1 | $precise2 | $precise3";

// Работа интерпритатора с разными ковычками
$a = 1;
echo "$a";
echo '$a';

// Приведение типа переменной
$c = 10;
$d = (boolean)$c;

// Математические операции
$e = 4;
$f = 5;
echo $e + $f . '<br>';    // сложение
echo $e * $f . '<br>';    // умножение
echo $e - $f . '<br>';    // вычитание
echo $e / $f . '<br>';  // деление
echo $e % $f . '<br>'; // остаток от деления
echo $e ** $f . '<br>'; // возведение в степень

// Инкремин и декремент
$g = 4;
$h = 5;
$g += $h;
echo 'g = ' . $g;
$g = 0;
echo $g++;     // Постинкремент
echo ++$g;    // Преинкремент
echo $g--;     // Постдекремент
echo --$g;    // Предекремент

// Операции сравнения
$k = 4;
$l = 5;
var_dump($k == $l);  // Сравнение по значению
var_dump($k === $l); // Сравнение по значению и типу
var_dump($k > $l);    // Больше
var_dump($k < $l);    // Меньше
var_dump($k <> $l);  // Не равно
var_dump($k != $l);   // Не равно
var_dump($k !== $l); // Не равно без приведения типов
var_dump($k <= $l);  // Меньше или равно
var_dump($k >= $l);  // Больше или равно