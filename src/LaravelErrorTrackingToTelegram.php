<?php

namespace Samueletur\LaravelErrorTrackingToTelegram;

use Throwable;
use Telegram\Bot\Api as TelegramApi;

class LaravelErrorTrackingToTelegram
{
    public static function send(Throwable $exception)
    {
        if(config('error_tracking_telegram.telegram_bot_token')) {
            $telegram = new TelegramApi(env('TELEGRAM_BOT_TOKEN'));
            $name = 'Erro aplicação '.env('APP_NAME');
            
            $message = self::jsonToText([
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'url' => url()->full()
            ]);
    
            $telegram->sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'), // Chat Samuel
                'text' => "<b>{$name}</b>\n{$message}",
                'parse_mode' => 'HTML',
            ]);
        }
    }

    public static function jsonToText($message)
    {
        $message = json_encode($message, JSON_UNESCAPED_UNICODE);
        $message = str_replace(['<', '>'], ['&lt;', '&gt;'], $message);
        $message = self::traitMessage(json_decode($message, true));

        if (mb_strlen($message) > 4000) {
            $message = mb_substr($message, 0, 4000) . "...";
        }

        return $message;
    }

    public static function traitMessage($arr)
    {
        $text = '';

        foreach ($arr as $key => $value) {
            if (is_array($value) == false) {
                $text .= "{$key}: {$value}\n";
            } else {
                $text .= "\n{$key}:\n" . self::traitMessage($value) . "\n";
            }
        }

        return $text;
    }
}
