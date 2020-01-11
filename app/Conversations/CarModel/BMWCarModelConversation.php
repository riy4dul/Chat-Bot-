<?php

namespace App\Conversations\CarModel;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class BMWCarModelConversation extends Conversation
{
    public function askModelName()
    {
        $this->bot->reply(Question::create("Please select your car`s model name⬇")
            ->addButtons([
                Button::create('⬅Go Back')->value('GO_BACK_BRAND_LIST'),
                Button::create('BMW X1')->value('Model_BMW_X1'),
                Button::create('BMW X3')->value('Model_BMW_X3'),
                Button::create('BMW X6')->value('Model_BMW_X6'),
                Button::create('BMW Z4')->value('Model_BMW_Z4'),
                Button::create('BMW i8')->value('Model_BMW_i8'),
                Button::create('BMW 6 Series')->value('Model_BMW_6_Series'),
                Button::create('BMW i3')->value('Model_BMW_i3'),
                Button::create('BMW M Series')->value('Model_BMW_M_Series'),
                Button::create('BMW Z4')->value('Model_BMW_Z4'),
                Button::create('BMW 1 Series')->value('Model_BMW_1_Series'),
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
