<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\SalesCenterModel;

class SalesCenterInfoConversation extends Conversation
{
    public function askCity()
    {
        $this->say('Please enter your city?');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askCity();
    }
}
