<?php

class Guest
{
    private string $uid;
    private Session $session;

    private int $step = 0;

    const replays = [
        'positive' => [
            'Привет, давай',
            'Перловку, отбивную, блинчики',
            'Да'
        ]
    ];

    public function __construct(Session $session)
    {

    }

    public function say($rep = 'positive')
    {
        $rep = $this::replays[$rep][$this->step];
        $this->step++;
        return $rep;
    }

    public function getOrders()
    {

    }
}
