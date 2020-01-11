<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use App\BrandModel;
use DB;

class ShowGalleryConversation extends Conversation
{
    public function askGalleryCar()
    {
        $latestCarList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->where('brand_gallery_cars', 'Yes')
            ->orderBy(DB::raw('RAND()'))
            ->take(6)
            ->get();

        if (count($latestCarList) > 0) {
            $latestCarArray = array();
            foreach ($latestCarList as $latestCar) {
                $latestCarArray[] = Element::create($latestCar->car_brands_name)
                    ->subtitle($latestCar->brand_model)
                    ->image($latestCar->brand_image_link)
                    ->addButton(ElementButton::create('See More')->url($latestCar->brand_specifications))
                    ->addButton(ElementButton::create('Show More')
                        ->payload('SHOW_MORE_CAR')->type('postback'));
            }

            $this->say(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements($latestCarArray)
            );
        } else {
            $this->say('Sorry, currently there are no gallery!!');
            $this->bot->startConversation(new WelcomeConversation);
        }

    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askGalleryCar();
    }
}
