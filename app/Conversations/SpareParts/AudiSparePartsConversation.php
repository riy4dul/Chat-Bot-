<?php

namespace App\Conversations\SpareParts;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use App\SparePartsModel;


class AudiSparePartsConversation extends Conversation
{
    protected $modelName;
    protected $partsName;

    public function askModelName()
    {
        $this->ask('Please enter your car`s model name⬇?', function (Answer $answer) {
            // get brand Name
            $this->modelName = $answer->getText();
            //check model name exists or not
            $modelName = SparePartsModel::where('spare_parts_model', 'like', '%' . $this->modelName . '%')->first();
            if (!empty($modelName)) {
                $this->askPartsName();
            } else {
                $this->say('Sorry no car model were found.');
                $this->bot->reply(Question::create("Do you want to search again⬇")
                    ->addButtons([
                        Button::create('Yes')->value('sparePartsCarSearch'),
                        Button::create('No')->value('MENU_OPTION')
                    ]));
            }
        });
    }

    //get Parts Model Name
    public function askPartsName()
    {
        $this->ask('Please enter part`s model number?', function (Answer $answer) {
            // get brand Name
            $this->partsName = $answer->getText();
            $partName = SparePartsModel::where('spare_parts_name', 'like', '%' . $this->partsName . '%')->first();

            if (!empty($partName)) {
                $this->getPartsName();
            } else {
                $this->say('Sorry, no spare parts were found.');
                $this->bot->reply(Question::create("Do you want to search again⬇")
                    ->addButtons([
                        Button::create('Yes')->value('sparePartsCarSearch'),
                        Button::create('No')->value('MENU_OPTION')
                    ]));
            }
        });
    }


    //get Result for parts
    public function getPartsName()
    {
        $partList = SparePartsModel::where('spare_parts_brand', 'like', '%' . 'Audi' . '%')
            ->where('spare_parts_model', 'like', '%' . $this->modelName . '%')
            ->where('spare_parts_name', 'like', '%' . $this->partsName . '%')
            ->where('spare_parts_stock', 'Yes')
            ->first();

        if (!empty($partList)) {
            $this->say(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements([
                    Element::create($partList->spare_parts_name)
                        ->subtitle('Price: ' . $partList->spare_parts_price . ' (in stock)')
                        ->image($partList->spare_parts_image)
                        ->addButton(ElementButton::create('See More')->url('https://nomadtech.com.bd'))
                ])
            );
        } else {
            $this->say($this->partsName . ' is out of stock');
        }
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askModelName();
    }
}
