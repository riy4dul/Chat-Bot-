<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class CarsConversation extends Conversation
{
    public function askCar()
    {
        $this->bot->reply(Question::create("Okay, here is what I found⬇")
            ->addButtons([
                Button::create('Finds Cars 🔍')->value('FindsCars'),
                Button::create('Latest Cars 🚗')->value('LatestCars'),
                Button::create('Top Seller 📈')->value('TopSeller'),
                Button::create('Show Gallery 🚗')->value('ShowGallery'),
                Button::create('Price Range 💲')->value('priceRange')
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
