<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use App\BrandModel;

class LatestCarsConversation extends Conversation
{
    public function askLatestCar()
    {
        $latestCarList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->where('brand_latest_cars', 'Yes')->take(6)
            ->inRandomOrder()
            ->get();

        $latestCarArray = array();
        foreach ($latestCarList as $latestCar) {
            $latestCarArray[] = Element::create($latestCar->car_brands_name)
                ->subtitle($latestCar->brand_model)
                ->image($latestCar->brand_image_link)
                ->addButton(ElementButton::create('See More')->url('https://nomadtech.com.bd'))
                ->addButton(ElementButton::create('Latest Car')
                    ->payload('LATEST_RELATED_CAR')->type('postback'));
        }

        $this->say(GenericTemplate::create()
            ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
            ->addElements($latestCarArray)
        );
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askLatestCar();
    }
}
