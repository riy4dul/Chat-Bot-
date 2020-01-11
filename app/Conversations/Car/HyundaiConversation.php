<?php

namespace App\Conversations\Car;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use App\BrandModel;
use DB;
use App\CarBrandModel;


class HyundaiConversation extends Conversation
{
    public function askCarBrand()
    {
        $brandList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->where('car_brands.car_brands_name', 'like', '%' . 'Hyundai' . '%')
            ->where('brand_status', 'Active')
            ->orderBy(DB::raw('RAND()'))
            ->take(6)
            ->get();

        $arrayCar = array();
        foreach ($brandList as $brand) {
            $arrayCar[] = Element::create($brand->car_brands_name)
                ->subtitle($brand->brand_model)
                ->image($brand->brand_image_link)
                ->addButton(ElementButton::create('See More')->url($brand->brand_specifications))
                ->addButton(ElementButton::create('Finds Related Car')
                    ->payload('FINDS_RELATED_CAR')->type('postback'));
        }

        $this->bot->typesAndWaits(2);
        $this->bot->reply(GenericTemplate::create()
            ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
            ->addElements($arrayCar)
        );
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askCarBrand();
    }
}
