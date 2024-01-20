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

$d->waiter($w->hello());
$d->guest($g->say());

while (!$w->isComplete()) {
    $d->waiter($w->say());
    $d->guest($g->say());
}

/*d
POST https://api.openai.com/v1/chat/completions
Content-Type: application/json
Authorization: Bearer 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

{
    "model": "gpt-4",
  "messages": [
    {
      "role": "system",
      "content": "Действуй как вежливый и доброжелательный официант ресторана. Расскажи что есть в меню. Прими заказ у посетителей, строго придерживаясь меню. Оформи заказ в виде списка используя полное название блюда из меню."
    },
    {
      "role": "system",
      "content": "Меню: - Перловка охотничья томленая со свиными ребрышками и овощами \n - Шейка аппетитная (свинина) запечённая в копчённой паприке с томатным соусом,\n - Отбивная куриная в хрустящей корочке.\n - Блинчики с яблоком и корицей/клубникой/твopoгoм.\n - Сырники ванильные со сметаной.\n - Картофель отварной с зеленью и маслом\n - Макароны с маслом.\n - Плетенка яблоком.\n"
    }
  ]
}
*/
