<?php

namespace App\Conversations\Price;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use App\BrandModel;


class priceRange_8_To_15L_Conversation extends Conversation
{
    public function askCarPrice()
    {
        $brandList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->whereBetween('brand_price', array(800000, 1500000))->get();

        if (count($brandList) > 0) {
            $carPriceArray = array();
            foreach ($brandList as $brand) {
                $carPriceArray[] = Element::create($brand->car_brands_name)
                    ->subtitle($brand->brand_model . '(Price: ' . $brand->brand_price . ')')
                    ->image($brand->brand_image_link)
                    ->addButton(ElementButton::create('See More')->url('https://nomadtech.com.bd'))
                    ->addButton(ElementButton::create('Latest Car')
                        ->payload('LATEST_RELATED_CAR')->type('postback'));
            }

            $this->bot->reply(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements($carPriceArray)
            );

            $this->bot->reply(Question::create("Do you want to search again⬇")
                ->addButtons([
                    Button::create('Yes')->value('priceRange'),
                    Button::create('No')->value('MENU_OPTION')
                ]));
        } else {
            $this->bot->reply('Sorry,this price range cars out of stock');
            $this->bot->typesAndWaits(2);
            $this->bot->reply(Question::create("Do you want to search again⬇")
                ->addButtons([
                    Button::create('Yes')->value('priceRange'),
                    Button::create('No')->value('MENU_OPTION')
                ]));
        }
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askCarPrice();
    }
}
