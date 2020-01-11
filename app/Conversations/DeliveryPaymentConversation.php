<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class DeliveryPaymentConversation extends Conversation
{
    public function askDevliveryPayment()
    {
        $this->say('Sorry, currently this service not available!');
        $this->bot->startConversation(new WelcomeConversation);
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askDevliveryPayment();
    }
}
