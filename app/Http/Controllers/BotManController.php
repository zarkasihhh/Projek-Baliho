<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}',function($botman,$message){

            if ($message == 'hi' || in_array($message, ['hallo', 'hai', 'halo', 'hei', 'hi', 'pagi', 'siang', 'sore', 'malam'])) {
                $responses = [
                    "Hai! CuBatbot di sini. Mau tau informasi tentang apa nih?",
                    "Halo! Aku CuBatbot, salam kenal ya! Mau tau tentang Bali, kan?",
                    "Helo! Dengan CuBatbot disini. Lagi kepo sama Bali ya?"
                ];
                $response = $responses[array_rand($responses)];
                $botman->reply($response);
            }
            else if (in_array($message, ['Dah', 'Dadah', 'Bye', 'Byee', 'Good bye', 'Selamat tinggal', 'Sampai jumpa', 'Bai', 'See you'])) {
                $responses = [
                    "Bye!",
                    "Dadahh!",
                    "Good bye!",
                    "Dahh, semoga harimu menegangkan yaa!",
                    "Sampai jumpa lagi!",
                    "See u! Senang bisa membantu"
                ];
                $response = $responses[array_rand($responses)];
                $botman->reply($response);
            }
            else {
                $botman->reply("Coba Kata Lain :)");
            }

        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask("Hello! What is Your Name?",function(Answer $answer){
            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }
}
