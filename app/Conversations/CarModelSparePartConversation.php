<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class CarModelSparePartConversation extends Conversation
{
    //get Parts Model Name
    public function askPartsName()
    {
        $this->say('Please write part`s model number?');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askPartsName();
    }
}
