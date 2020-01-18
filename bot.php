<?php
require_once("vendor/autoload.php");

//$bot = new \TelegramBot\Api\BotApi('1011193242:AAFhi5OqpF92E3YC3j8KwIcCOh7k-HyF5yY');

try {
    $bot = new \TelegramBot\Api\Client('1011193242:AAFhi5OqpF92E3YC3j8KwIcCOh7k-HyF5yY');
    // or initialize with botan.io tracker api key
    // $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');

    $bot->command('start', function ($message) use ($bot) {
        $answer = 'Добро пожаловать! Ильдар';
        $bot->sendMessage($message->getChat()->getId(), $answer);
    });

    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });

    $bot->run();


} catch (\TelegramBot\Api\Exception $e) {
    $exe = $e->getMessage();
    //file_put_contents('text.txt', $exe);
}



