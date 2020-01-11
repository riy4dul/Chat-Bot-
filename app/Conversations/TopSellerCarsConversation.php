<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use App\BrandModel;
use DB;

class TopSellerCarsConversation extends Conversation
{
    public function askSellerCar()
    {
        $latestCarList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->where('brand_top_seller_cars', 'Yes')->orderBy(DB::raw('RAND()'))
            ->take(6)
            ->get();

        $latestCarArray = array();
        foreach ($latestCarList as $latestCar) {
            $latestCarArray[] = Element::create($latestCar->car_brands_name)
                ->subtitle($latestCar->brand_model)
                ->image($latestCar->brand_image_link)
                ->addButton(ElementButton::create('See More')->url('https://nomadtech.com.bd'))
                ->addButton(ElementButton::create('Related Car')
                    ->payload('TOP_SELLER_RELATED_CAR')->type('postback'));
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
        $this->askSellerCar();
    }
}
