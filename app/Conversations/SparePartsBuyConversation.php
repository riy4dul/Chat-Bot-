<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\SparePartsOrderModel;


class SparePartsBuyConversation extends Conversation
{
    public $name;
    public $address;
    public $phone;
    public $id;
    public $data;


    function __construct ($id)
    {
        $this->id=$id;
    }
    public function askName()
    {
        $this->ask('Hello! What is your Name?', function(Answer $answer) {
            $this->name = $answer->getText();
            $this->askAddress();
            //$this->say($this->id);

        });
    }

    public function askAddress()
    {
        $this->ask('what is your Address?', function(Answer $answer) {
           $this->address = $answer->getText();
            $this->askPhone();
        });
    }

    public function askPhone()
    {
        $this->ask('what is your Mobile Number?', function(Answer $answer) {
        // Save result
        $this->phone = $answer->getText();
        $this->asksave();
        });
    }

public function asksave()
    {

      $data= new SparePartsOrderModel();
             $data->name = $this->name;
             $data->spare_parts_id = $this->id;
             $data->address = $this->address;
             $data->phone = $this->phone;
             //$this->say($this->name);
             $data->save();


      $this->say('Thank you so much. customer care executive call you in short time');  
    }


    

    public function run()
    {
        // This will be called immediately
        $this->askName();
    }

    
}
