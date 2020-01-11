<?php

namespace App\Conversations\CarModel;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class AudiCarModelConversation extends Conversation
{
    public function askModelName()
    {

        $this->bot->reply(Question::create("Please select your car`s model name⬇")
            ->addButtons([
                Button::create('⬅Go Back')->value('GO_BACK_BRAND_LIST'),
                Button::create('Audi TT')->value('Model_A_TT'),
                Button::create('Audi Q3')->value('Model_A_Q3'),
                Button::create('Audi A6')->value('Model_A_A6'),
                Button::create('Audi Q5')->value('Model_A_Q5'),
                Button::create('Audi A4')->value('Model_A_A4'),
                Button::create('Audi A8')->value('Model_A_A8'),
                Button::create('Audi A5')->value('Model_A_A5'),
                Button::create('Audi A3')->value('Model_A_A3'),
                Button::create('Audi RS 2 Avant')->value('Model_A_RS_2_Avant'),
                Button::create('Audi Coupe GT')->value('Model_A_Coupe_GT'),
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
