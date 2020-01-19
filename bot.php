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
                [     'Сиськи 👋'   ]
            ], true, true);


        //$answer = $message->getChat()->getMessage();
        $bot->sendMessage($message->getChat()->getId(), "тест", false, false, null, null, $keyboard);
    });

    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });

    $bot->command("ibutton", function ($message) use ($bot) {
        $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['callback_data' => 'data_test', 'text' => 'Answer'],
                    ['callback_data' => 'data_test2', 'text' => 'ОтветЪ']
                ]
            ]
        );

        $bot->sendMessage($message->getChat()->getId(), "тест", false, null,null,$keyboard);
    });

    $bot->on(function($update) use ($bot, $callback_loc, $find_command){
        $callback = $update->getCallbackQuery();
        $message = $callback->getMessage();

        $mtext = $update->getMessage()->getText();

        $chatId = $message->getChat()->getId();
        $data = $callback->getData();

        if($data == "data_test"){
            $bot->answerCallbackQuery( $callback->getId(), "This is Ansver!",true);
        }
        if($data == "data_test2"){
            $bot->sendMessage($chatId, "Это ответ!");
            $bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
        }
        if($mtext == "Сиськи 👋"){
            $bot->sendMessage( $update->getChat()->getId(), "This is Ansver!",true);
            //$pic = "http://aftamat4ik.ru/wp-content/uploads/2017/05/14277366494961.jpg";
            //$bot->sendPhoto($chatId, $pic);
        }

    }, function($update){
        $callback = $update->getCallbackQuery();
        if (is_null($callback) || !strlen($callback->getData()))
            return false;
        return true;
    });

//$bot->on(function($Update) use ($bot){
//    $message = $Update->getMessage();
//    $mtext = $message->getText();
//    $cid = $message->getChat()->getId();
//
//    if($mtext == "Сиськи 👋"){
//        //$bot->sendMessage($message->getChat()->getId(), "-");
//        $pic = "http://aftamat4ik.ru/wp-content/uploads/2017/05/14277366494961.jpg";
//        $bot->sendPhoto($message->getChat()->getId(), $pic);
//    }
//
//}, function($message) use ($name){
//    return true;
//});



    $bot->run();


} catch (\TelegramBot\Api\Exception $e) {
    $exe = $e->getMessage();
    file_put_contents('text.txt', $exe);
}



