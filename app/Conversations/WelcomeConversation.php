<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class WelcomeConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $this->bot->reply(Question::create("Ok, let's get started. Here are some options⬇")
            ->addButtons([
                Button::create('Cars 🚗')->value('CarsList'),
                Button::create('Promotions 💥')->value('Pro'),
                Button::create('Sales Center Information 💼')->value('SalesCenterInformation'),
                Button::create('Loan Information 💲')->value('LoanInformation'),
                Button::create('Spare Parts 🔨')->value('SpareParts'),
                Button::create('Delivery Option&payment Method 🎁')->value('DeliveryOptionPaymentMethod'),
            ]));
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
