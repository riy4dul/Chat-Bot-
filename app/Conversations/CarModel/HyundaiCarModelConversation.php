<?php

namespace App\Conversations\CarModel;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class HyundaiCarModelConversation extends Conversation
{
    public function askModelName()
    {
        $this->bot->reply(Question::create("Please select your car`s model name⬇")
            ->addButtons([
                Button::create('⬅Go Back')->value('GO_BACK_BRAND_LIST'),
                Button::create('Hyundai Accent')->value('Model_Hyundai_Accent'),
                Button::create('Hyundai Tucson')->value('Model_Hyundai_Tucson'),
                Button::create('Hyundai Elantra')->value('Model_Hyundai_Elantra'),
                Button::create('Hyundai Santa Fe')->value('Model_Hyundai_Santa_Fe'),
                Button::create('Hyundai Getz')->value('Model_Hyundai_Getz'),
                Button::create('Hyundai Atos')->value('Model_Hyundai_Atos'),
                Button::create('Hyundai Sonata')->value('Model_Hyundai_Sonata'),
                Button::create('Hyundai i20')->value('Model_Hyundai_i20'),
                Button::create('Hyundai Ioniq')->value('Model_Hyundai_Ioniq'),
                Button::create('Hyundai Eon')->value('Model_Hyundai_Eon'),
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
