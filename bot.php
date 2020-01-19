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
            ], false, true);


        //$answer = $message->getChat()->getMessage();
        $bot->sendMessage($message->getChat()->getId(), "тест", false, null, null, $keyboard);
    });

    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });

    $bot->command("job", function ($message) use ($bot) {
        $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['callback_data' => 'step1', 'text' => 'Розлив'],
                    ['callback_data' => 'step2', 'text' => 'Дозирование сокатализатора'],
                    ['callback_data' => 'step3', 'text' => 'Дозирование катализатора'],
                ]
            ]
        );
        $bot->sendMessage($message->getChat()->getId(), "Здравствуйте, выберите участок", false, null,null,$keyboard);
    });

//    $bot->on(function($update) use ($bot, $callback_loc, $find_command){
//        $callback = $update->getCallbackQuery();
//        $message = $callback->getMessage();
//        $chatId = $message->getChat()->getId();
//        $data = $callback->getData();
//
//        if($data == "data_test"){
//            $bot->answerCallbackQuery( $callback->getId(), "This is Ansver!",true);
//        }
//        if($data == "data_test2"){
//            $bot->sendMessage($chatId, "Это ответ!");
//            $bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
//        }
//    }, function($update){
//        $callback = $update->getCallbackQuery();
//        if (is_null($callback) || !strlen($callback->getData()))
//            return false;
//        return true;
//    });

    // Отлов любых сообщений + обрабтка reply-кнопок
    $bot->on(function($Update) use ($bot){

        $message = $Update->getMessage();
        $mtext = $message->getText();
        $cid = $message->getChat()->getId();

        if(mb_stripos($mtext,"Сиськи 👋") !== false){
            $pic = "http://aftamat4ik.ru/wp-content/uploads/2017/05/14277366494961.jpg";
            $bot->sendPhoto($message->getChat()->getId(), $pic);
        }
        if(mb_stripos($mtext,"власть советам") !== false){
            $bot->sendMessage($message->getChat()->getId(), "Смерть богатым!");
        }

        if(mb_stripos($mtext,"1") !== false){
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



