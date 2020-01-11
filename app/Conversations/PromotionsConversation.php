<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use App\PromotionsModel;

class PromotionsConversation extends Conversation
{
    public function askPromotion()
    {
        $loanInformationList = PromotionsModel::where('promotion_status', 'Active')->get();
        if(count($loanInformationList) > 0){
            foreach ($loanInformationList as $loanInformation){
                $this->say($loanInformation->promotion_description);
            }
        }else{
            $this->say('Sorry, Currently Are No Promotions Available!!');
            $this->bot->startConversation(new WelcomeConversation);
        }
    }



    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askPromotion();
    }
}
