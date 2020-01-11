<?php

namespace App\Conversations\CarModel;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class NissanCarModelConversation extends Conversation
{
    public function askModelName()
    {
        $this->bot->reply(Question::create("Please select your car`s model name⬇")
            ->addButtons([
                Button::create('⬅Go Back')->value('GO_BACK_BRAND_LIST'),
                Button::create('Nissan Maxima')->value('Model_Nissan_Maxima'),
                Button::create('Nissan NV200')->value('Model_Nissan_NV200'),
                Button::create('Nissan Leaf')->value('Model_Nissan_Leaf'),
                Button::create('Nissan Pathfinder')->value('Model_Nissan_Pathfinder'),
                Button::create('Nissan Juke')->value('Model_Nissan_Juke'),
                Button::create('Nissan Altima')->value('Model_Nissan_Altima'),
                Button::create('Nissan Micra')->value('Model_Nissan_Micra'),
                Button::create('Nissan Armada')->value('Model_Nissan_Armada'),
                Button::create('Nissan Sentra')->value('Model_Nissan_Sentra'),
                Button::create('Nissan 370Z')->value('Model_Nissan_370Z'),
            ]));
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askModelName();
    }
}
