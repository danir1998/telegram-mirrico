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

    // Отлов любых сообщений + обрабтка reply-кнопок
$bot->on(function($Update) use ($bot){
    
    $message = $Update->getMessage();
    $mtext = $message->getText();
    $cid = $message->getChat()->getId();
    
    if(mb_stripos($mtext,"Сиськи") !== false){
        $pic = "http://aftamat4ik.ru/wp-content/uploads/2017/05/14277366494961.jpg";

        $bot->sendPhoto($message->getChat()->getId(), $pic);
    }
    if(mb_stripos($mtext,"власть советам") !== false){
        $bot->sendMessage($message->getChat()->getId(), "Смерть богатым!");
    }
}, function($message) use ($name){
    return true; // когда тут true - команда проходит
});



    $bot->run();


} catch (\TelegramBot\Api\Exception $e) {
    $exe = $e->getMessage();
    file_put_contents('text.txt', $exe);
}



