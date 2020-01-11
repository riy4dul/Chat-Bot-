<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class SparePartsConversation extends Conversation
{
    public function askBrandName()
    {
        $this->bot->reply(Question::create("Okay, here is what i found some cars brand⬇")
            ->addButtons([
                Button::create('Audi')->value('AudiSpareParts'),
                Button::create('Nissan')->value('NissanSpareParts'),
                Button::create('BMW')->value('BMWSpareParts'),
                Button::create('Hyundai')->value('HyundaiSpareParts')
            ]));
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askBrandName();
    }
}
