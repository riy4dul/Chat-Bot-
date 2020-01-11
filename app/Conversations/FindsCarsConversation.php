<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class FindsCarsConversation extends Conversation
{
    public function askBrand()
    {
        $this->bot->reply(Question::create("Okay, here is what i found some cars brand⬇")
            ->addButtons([
                Button::create('Audi')->value('AudiFindsCar'),
                Button::create('Nissan')->value('NissanFindsCar'),
                Button::create('BMW')->value('BMWFindsCar'),
                Button::create('Hyundai')->value('HyundaiFindsCar')
            ]));

    }



    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askBrand();
    }
}
