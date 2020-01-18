<?php
require_once("vendor/autoload.php");

//$bot = new \TelegramBot\Api\BotApi('1011193242:AAFhi5OqpF92E3YC3j8KwIcCOh7k-HyF5yY');

try {
    $bot = new \TelegramBot\Api\Client('1011193242:AAFhi5OqpF92E3YC3j8KwIcCOh7k-HyF5yY');

    $bot->command('start', function ($message) use ($bot) {
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(
            [
                ['7', '8', '9'],
                ['4', '5', '6'],
                ['1', '2', '3'],
                [     '0 👋'   ]
            ], true);


        $answer = $message->getChat()->getMessage();
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    });

    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });

    $bot->on(function($update2) use ($bot){

                $message2 = $update2->getMessage();
                $mtext = $message2->getText();
                $cid = $message2->getChat()->getId();

                if(mb_stripos($mtext,"власть советам") !== false){
                    $bot->sendMessage($message2->getChat()->getId(), "Смерть богатым!");
                }

    }, function($message2) use ($bot){
            return true; // когда тут true - команда проходит
    });



    $bot->run();


} catch (\TelegramBot\Api\Exception $e) {
    $exe = $e->getMessage();
    file_put_contents('text.txt', $exe);
}



