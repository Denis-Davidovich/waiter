<?php

namespace Alisa;

class Dialog
{
    private \Guest $gest;
    private \Waiter $waiter;

    public function __construct(\Waiter $waiter, \Guest $guest)
    {

    }

    public function waiter($message)
    {
        //Send message to Alisa
        echo sprintf("waiter: %s\n", $message);
        return 1;
    }

    public function guest($message)
    {
        //Get response from guest through Alisa
        echo sprintf("guest: %s\n", $message);
        return 1;
    }
}
