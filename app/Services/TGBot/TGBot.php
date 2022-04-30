<?php

namespace App\Services\TGBot;

class TGBot
{
    public function sendMessage($task)
    {
        $idChannel = config('tgbot.idChannel');
        $botToken = config('tgbot.botToken');
        $message = "Новая задача создана: " . $task->title
            . "   \n\nТекст задачи: " . $task->content
            . "   \n\nЗадача от: " . $task->user->name
            . "   \n\nСтатус задачи: " . $task->status->name;
        $message = urlencode($message);
        try {
            file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$idChannel&text=".$message);
        }
        catch (\Exception $e){

        }
    }
}
