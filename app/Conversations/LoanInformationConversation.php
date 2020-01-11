<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use App\LoanInformationModel;

class LoanInformationConversation extends Conversation
{

    public function askLoanInfo()
    {
        $loanInfoList = LoanInformationModel::where('loan_info_status', 'Active')->get();
        foreach ($loanInfoList as $loanInfo) {
            $this->say('Name: '.$loanInfo->loan_info_name . '. '
                . 'Designation: '. $loanInfo->loan_info_designation . '. '
                . 'Phone Number: '. $loanInfo->loan_info_phone
            );
        }
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askLoanInfo();
    }
}
