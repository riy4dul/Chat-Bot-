<?php

use App\Http\Controllers\BotManController;

use App\Conversations\WelcomeConversation;
use App\Conversations\LatestCarsConversation;
use App\Conversations\TopSellerCarsConversation;
use App\Conversations\ShowGalleryConversation;
use App\Conversations\PromotionsConversation;
use App\Conversations\DeliveryPaymentConversation;
use App\Conversations\LoanInformationConversation;
use App\Conversations\FindsCarsConversation;
use App\Conversations\SalesCenterInfoConversation;
use App\Conversations\SparePartsConversation;
use App\Conversations\SparePartsBuyConversation;
use App\Conversations\CarModelSparePartConversation;

use App\Conversations\Price\priceRange_3_To_4L_Conversation;
use App\Conversations\Price\priceRange_4_To_8L_Conversation;
use App\Conversations\Price\priceRange_8_To_15L_Conversation;
use App\Conversations\Price\priceRange_15_To_30L_Conversation;
use App\Conversations\Price\priceRange_30_To_UpL_Conversation;

use App\Conversations\Car\AudiConversation;
use App\Conversations\Car\BMWConversation;
use App\Conversations\Car\HyundaiConversation;
use App\Conversations\Car\NissanConversation;

use App\Conversations\SpareParts\AudiSparePartsConversation;
use App\Conversations\SpareParts\BMWSparePartsConversation;
use App\Conversations\SpareParts\NissanSparePartsConversation;
use App\Conversations\SpareParts\HyundaiSparePartsConversation;

use App\Conversations\CarModel\AudiCarModelConversation;
use App\Conversations\CarModel\BMWCarModelConversation;
use App\Conversations\CarModel\HyundaiCarModelConversation;
use App\Conversations\CarModel\NissanCarModelConversation;

use App\Conversations\CarsPriceRangeConversation;
use App\Conversations\CarsConversation;


use BotMan\BotMan\Middleware\ApiAi;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\BrandModel;
use App\SalesCenterModel;
use App\SparePartsModel;

$botman = resolve('botman');

//get start message
$botman->hears('GET_STARTED', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->reply('Hi from ChatBot. i!m here to bring you the most important information of car!');
    $bot->startConversation(new WelcomeConversation);
});

//greeting message
$botman->hears('Hi', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->reply('Hello!');
    $bot->reply('How can i help you.');
});

//greeting message
$botman->hears('Hello', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->reply('Hi!');
    $bot->reply('How can i help you.');
});

$botman->hears('Start conversation', BotManController::class . '@startConversation');

// Menu Option post back function
$botman->hears('MENU_OPTION', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new WelcomeConversation);
});

// Gallery post back function
$botman->hears('CARS_GALLERY_PICTURE', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new ShowGalleryConversation);
});

//dialogflow
$dialogflow = ApiAi::create('be2a784c752a4d138b282758e9d718f6')->listenForAction();

$botman->middleware->received($dialogflow);

// find car NLP
$botman->hears('find_car', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiParametersBrand = $extras['apiParameters']['car_brand'];
    $apiParametersModel = $extras['apiParameters']['car_model'];

    if (!empty($apiParametersBrand)) {
        $implodeApiParametersBrand = implode(' ', $apiParametersBrand);
    }

    if (!empty($apiParametersModel)) {
        $implodeApiParametersModel = implode(' ', $apiParametersModel);
    }

    if (!empty($implodeApiParametersModel)) {
        $ModelList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->where('car_brands.car_brands_name', 'like', '%' . $implodeApiParametersModel . '%')->get();
        if (count($ModelList) > 0) {
            $arrayModel = array();
            foreach ($ModelList as $model) {
                $arrayModel[] = Element::create($model->car_brands_name)
                    ->subtitle($model->brand_model . '(Price: ' . $model->brand_price . ')')
                    ->image($model->brand_image_link)
                    ->addButton(ElementButton::create('visit')->url('https://nomadtech.com.bd'))
                    ->addButton(ElementButton::create('Show More')
                        ->payload('SHOW_MORE_CAR')->type('postback'));
            }
            $bot->typesAndWaits(2);
            $bot->reply(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements($arrayModel)
            );
        } else {
            $bot->typesAndWaits(2);
            $bot->reply('I didn`t catch that. Maybe the menu can help?');
        }
    } elseif (!empty($implodeApiParametersBrand)) {
        $brandList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->where('car_brands.car_brands_name', 'like', '%' . $implodeApiParametersBrand . '%')->get();
        if (count($brandList) > 0) {
            $arrayBrand = array();
            foreach ($brandList as $brand) {
                $arrayBrand[] = Element::create($brand->car_brands_name)
                    ->subtitle($brand->brand_model . '(Price: ' . $brand->brand_price . ')')
                    ->image($brand->brand_image_link)
                    ->addButton(ElementButton::create('visit')->url('https://nomadtech.com.bd'))
                    ->addButton(ElementButton::create('Show More')
                        ->payload('SHOW_MORE_CAR')->type('postback'));
            }
            $bot->typesAndWaits(2);
            $bot->reply(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements($arrayBrand)
            );
        } else {
            $bot->typesAndWaits(2);
            $bot->reply('I didn`t catch that. Maybe the menu can help?');
        }
    } elseif (!empty($implodeApiParametersBrand) && !empty($implodeApiParametersModel)) {
        $brandModelList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->where('brand_model', 'like', '%' . $implodeApiParametersModel . '%')
            ->where('car_brands.car_brands_name', 'like', '%' . $implodeApiParametersBrand . '%')->get();
        if (count($brandModelList) > 0) {
            $arrayBrandModel = array();
            foreach ($brandModelList as $brandModel) {
                $arrayBrandModel[] = Element::create($brandModel->car_brands_name)
                    ->subtitle($brandModel->brand_model . '(Price: ' . $brandModel->brand_price . ')')
                    ->image($brandModel->brand_image_link)
                    ->addButton(ElementButton::create('visit')->url('https://nomadtech.com.bd'))
                    ->addButton(ElementButton::create('Show More')
                        ->payload('SHOW_MORE_CAR')->type('postback'));
            }
            $bot->typesAndWaits(2);
            $bot->reply(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements($arrayBrandModel)
            );
        } else {
            $bot->typesAndWaits(2);
            $bot->reply('I didn`t catch that. Maybe the menu can help?');
        }
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//menu and option show
$botman->hears('option_menu', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];

    if ($apiAction === 'option_menu') {
        $bot->typesAndWaits(2);
        $bot->startConversation(new WelcomeConversation);
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

$botman->hears('CarsList', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarsConversation);
});

$botman->hears('FindsCars', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new FindsCarsConversation);
});

$botman->hears('AudiFindsCar', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new AudiConversation);
});

$botman->hears('NissanFindsCar', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new NissanConversation);
});

$botman->hears('BMWFindsCar', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new BMWConversation);
});

$botman->hears('HyundaiFindsCar', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new HyundaiConversation);
});

$botman->hears('LatestCars', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new LatestCarsConversation);
});

$botman->hears('TopSeller', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new TopSellerCarsConversation);
});

$botman->hears('ShowGallery', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new ShowGalleryConversation);
});

$botman->hears('priceRange', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarsPriceRangeConversation);
});

$botman->hears('3 L-4 L', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new priceRange_3_To_4L_Conversation);
});

$botman->hears('4 L-8 L', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new priceRange_4_To_8L_Conversation);
});

$botman->hears('8 L-15 L', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new priceRange_8_To_15L_Conversation);
});

$botman->hears('15 L-30 L', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new priceRange_15_To_30L_Conversation);
});

$botman->hears('30 L Up', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new priceRange_30_To_UpL_Conversation);
});

$botman->hears('Pro', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new PromotionsConversation);
});

$botman->hears('SalesCenterInformation', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new SalesCenterInfoConversation);
});

$botman->hears('LoanInformation', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new LoanInformationConversation);
});

$botman->hears('SpareParts', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new SparePartsConversation);
});

$botman->hears('DeliveryOptionPaymentMethod', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new DeliveryPaymentConversation);
});

//latest Car
$botman->hears('latest_car', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];

    if ($apiAction === 'latest_car') {
        $bot->typesAndWaits(2);
        $bot->startConversation(new LatestCarsConversation);
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//top seller Car
$botman->hears('top_seller', function ($bot) {
    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];

    if ($apiAction === 'top_seller') {
        $bot->typesAndWaits(2);
        $bot->startConversation(new TopSellerCarsConversation);
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//show gallery car
$botman->hears('show_gallery', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];

    if ($apiAction === 'show_gallery') {
        $bot->typesAndWaits(2);
        $bot->startConversation(new ShowGalleryConversation);
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//show gallery car
$botman->hears('Sales_Center_Information', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiParametersSalesCenter = $extras['apiParameters']['sales_center_address'];

    if (!empty($apiParametersSalesCenter)) {
        $implodeApiParametersSalesCenter = implode(' ', $apiParametersSalesCenter);
    }

    if (!empty($implodeApiParametersSalesCenter)) {
        $bot->typesAndWaits(2);
        $addressListArray = array();
        $addressList = SalesCenterModel::where('sales_center_city', 'LIKE', '%' . $implodeApiParametersSalesCenter . '%')->get();
        if (count($addressList) > 0) {
            foreach ($addressList as $address) {
                $addressListArray[] = Element::create('Address: ' . $address->sales_center_address)
                    ->subtitle('Phone : ' . $address->sales_center_phone . '. '
                        . 'Working Hours: ' . $address->sales_center_working_hours . '. '
                        . 'Working Days: ' . $address->sales_center_working_days . '. '
                        . 'Working City: ' . $address->sales_center_city
                    );
            }

            $bot->reply(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements($addressListArray)
            );

            $bot->reply(Question::create("Do you want to search again⬇")
                ->addButtons([
                    Button::create('Yes')->value('SalesCenterInformation'),
                    Button::create('No')->value('MENU_OPTION')
                ]));

        } else {
            $bot->typesAndWaits(2);
            $bot->reply('I didn`t catch that. Maybe the menu can help?');
        }

    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//for fall back message
$botman->fallback(function ($bot) {
    $bot->typesAndWaits(2);
    $bot->reply('I didn`t catch that. Maybe the menu can help?');
});

//show gallery car
$botman->hears('current_promotions', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];

    if ($apiAction === 'current_promotions') {
        $bot->typesAndWaits(2);
        $bot->startConversation(new PromotionsConversation);
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//delivery and payment method
$botman->hears('delivery_payment_method', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];

    if ($apiAction === 'delivery_payment_method') {
        $bot->typesAndWaits(2);
        $bot->startConversation(new DeliveryPaymentConversation);
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//load information
$botman->hears('loan_facility', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];

    if ($apiAction === 'loan_facility') {
        $bot->typesAndWaits(2);
        $bot->startConversation(new LoanInformationConversation);
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//latest car call back
$botman->hears('LATEST_RELATED_CAR', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new LatestCarsConversation);
});

//top seller car call back
$botman->hears('TOP_SELLER_RELATED_CAR', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new TopSellerCarsConversation);
});

//find related car call back
$botman->hears('FINDS_RELATED_CAR', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new FindsCarsConversation);
});

//show more car call back
$botman->hears('SHOW_MORE_CAR', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new ShowGalleryConversation);
});

//Spare parts conversation
$botman->hears('AudiSpareParts', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new AudiCarModelConversation);
});

$botman->hears('NissanSpareParts', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new NissanCarModelConversation);
});

$botman->hears('BMWSpareParts', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new BMWCarModelConversation);
});

$botman->hears('HyundaiSpareParts', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new HyundaiCarModelConversation);
});

// spare parts car model search
$botman->hears('sparePartsCarSearch', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new SparePartsConversation);
});

//car gallery list
$botman->hears('car_list', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];

    if ($apiAction === 'car_list') {
        $bot->typesAndWaits(2);
        $bot->startConversation(new ShowGalleryConversation);
    } else {
        $bot->typesAndWaits(2);
        $bot->reply('I didn`t catch that. Maybe the menu can help?');
    }

})->middleware($dialogflow);

//Car model click and Show Spare Parts
$botman->hears('Model_A_TT', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_Q3', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_A6', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_Q5', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_A4', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_A8', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_A5', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_A3', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_RS_2_Avant', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_A_Coupe_GT', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});

$botman->hears('Model_BMW_X1', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_X3', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_X6', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_Z4', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_i8', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_6_Series', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_i3', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_M_Series', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_Z4', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_BMW_1_Series', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});

$botman->hears('Model_Hyundai_Accent', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_Tucson', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_Elantra', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_Santa_Fe', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_Getz', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_Atos', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_Sonata', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_i20', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_Ioniq', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Hyundai_Eon', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});

$botman->hears('Model_Nissan_Maxima', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_NV200', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_Leaf', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_Pathfinder', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_Juke', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_Altima', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_Micra', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_Armada', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_Sentra', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});
$botman->hears('Model_Nissan_370Z', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new CarModelSparePartConversation);
});



//spare parts
$botman->hears('Spare_parts', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];
    $apiParametersSpareParts = $extras['apiParameters']['spare_parts'];
    $apiParametersCarBrand = $extras['apiParameters']['car_brand'];

    if (!empty($apiParametersSpareParts)) {
        $bot->typesAndWaits(2);
        $partList = SparePartsModel::where('spare_parts_name', 'LIKE', '%' . $apiParametersSpareParts . '%')
            ->where('spare_parts_stock', 'Yes')
            ->first();

        if (!empty($partList)) {
            $bot->reply(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements([
                    Element::create($partList->spare_parts_name)
                        ->subtitle('Price: ' . $partList->spare_parts_price . ' (in stock)')
                        ->image($partList->spare_parts_image)
                        ->addButton(ElementButton::create('Details')->url('https://nomadtech.com.bd'))
                        ->addButton(ElementButton::create('Buy')
                            ->payload('sparePartsOrder'.$partList->spare_parts_id)->type('postback')),
                ])
            );

            $bot->reply(Question::create("Do you want to search again⬇")
                ->addButtons([
                    Button::create('Yes')->value('sparePartsCarSearch'),
                    Button::create('No')->value('MENU_OPTION')
                ]));

        } else {
            $bot->reply('I didn`t catch that. Maybe the menu can help?');
        }
    } elseif (!empty($apiParametersSpareParts) && !empty($apiParametersCarBrand)) {
        $bot->typesAndWaits(2);
        $partList = SparePartsModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->where('spare_parts_name', 'like', '%' . $apiParametersSpareParts . '%')
            ->where('car_brands.car_brands_name', 'like', '%' . $apiParametersCarBrand . '%')
            ->where('spare_parts_stock', 'Yes')
            ->first();

        if (!empty($partList)) {
            $bot->reply(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements([
                    Element::create($partList->spare_parts_name)
                        ->subtitle('Price: ' . $partList->spare_parts_price . ' (in stock)')
                        ->image($partList->spare_parts_image)
                        ->addButton(ElementButton::create('Details')->url('https://nomadtech.com.bd'))
                        ->addButton(ElementButton::create('Buy')
                            ->payload('sparePartsOrder'.$partList->spare_parts_id)->type('postback')),

                ])
            );

            $bot->reply(Question::create("Do you want to search again⬇")
                ->addButtons([
                    Button::create('Yes')->value('sparePartsCarSearch'),
                    Button::create('No')->value('MENU_OPTION')
                ]));
        } else {
            $bot->reply('I didn`t catch that. Maybe the menu can help?');
        }
    }

})->middleware($dialogflow);

// go back brand List
$botman->hears('GO_BACK_BRAND_LIST', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new SparePartsConversation);
});

//spare parts
$botman->hears('Spare_parts_option', function ($bot) {

    $extras = $bot->getMessage()->getExtras();
    $apiAction = $extras['apiAction'];
    $apiParametersSpareParts = $extras['apiParameters']['spare_parts_option'];
    $apiParametersCarBrand = $extras['apiParameters']['car_brand_option'];

    if (!empty($apiParametersSpareParts)) {
        $bot->typesAndWaits(2);
        $bot->startConversation(new SparePartsConversation);
    } elseif (!empty($apiParametersSpareParts) && !empty($apiParametersCarBrand)) {
        $bot->typesAndWaits(2);
        $partList = SparePartsModel::where('spare_parts_model', 'like', '%' . $apiParametersCarBrand . '%')
            ->where('spare_parts_stock', 'Yes')
            ->inRandomOrder()
            ->take(6)
            ->get();

        if (count($partList) > 0) {
            $arrayCar = array();
            foreach ($partList as $part) {
                $arrayCar[] = Element::create($part->spare_parts_name)
                    ->subtitle('Price: ' . $part->spare_parts_price . ' (in stock)')
                    ->image($part->spare_parts_image)
                    ->addButton(ElementButton::create('See More')->url('https://nomadtech.com.bd'));
            }

            $bot->typesAndWaits(2);
            $bot->reply(GenericTemplate::create()
                ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
                ->addElements($arrayCar)
            );

        } else {
            $bot->reply('I didn`t catch that. Maybe the menu can help?');
        }
    }

})->middleware($dialogflow);

//default help conversation
$botman->hears('help', function ($bot) {
    $bot->reply('I didn`t catch that. Maybe the menu can help?');
});

//spare_parts_buy
$botman->hears('sparePartsOrder{id}', function ($bot,$id) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new SparePartsBuyConversation($id));
});

