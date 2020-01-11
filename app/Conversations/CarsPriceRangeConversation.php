<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class CarsPriceRangeConversation extends Conversation
{
    public function askCar()
    {
        $this->bot->reply(Question::create("Okay, here is what i found some price range⬇")
            ->addButtons([
                Button::create('3-4 L')->value('3 L-4 L'),
                Button::create('4-8 L')->value('4 L-8 L'),
                Button::create('8-15 L')->value('8 L-15 L'),
                Button::create('15-30 L')->value('15 L-30 L'),
                Button::create('30 L Up')->value('30 L Up')
            ]));
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askCar();
    }
}
