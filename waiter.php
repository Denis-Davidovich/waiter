<?php

require_once __DIR__ . '/vendor/autoload.php';

// 0) Преследуем намерение принять заказ доставки еды.

// Флоу

// a) Поздороваться, рассказать меню на сегодня.
// b) Принять распознать заказанные блюда.
// c) Проговорить итоговый заказ.
// d) Оправить заказ в чат.
// e) Уточнить номер телефона.
// f) пожелать всего лучшего


//Буфер хранения реплик.
//Критерии перехода к следующему этапу.

$s = new Session();
$w = new Waiter($s);
$g = new Guest($s);
$u = new Client();

$d = new Alisa\Dialog($w, $g);
$d->loop();
