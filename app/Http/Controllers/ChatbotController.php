<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Debug\Dumper;

class ChatBotController extends Controller
{
    public function sendChat(Request $request)
    {
        $userMessage = $request->input('input');
        $response = $this->getBotResponse($userMessage);

        return $response;
    }

    private function getBotResponse($userMessage)
    {
        $jsonData = file_get_contents(public_path('bali.json'));

        $data = json_decode($jsonData, true);

        $botResponse = $this->getRandomResponse($userMessage, $data);

        if ($botResponse === $userMessage) {
            $botResponse = "Please paraphrase your question.";
        }

        return $botResponse;
    }

    private function getRandomResponse($userMessage, $data)
    {
        // Remove punctuation and convert to lowercase
        $userMessage = strtolower(preg_replace('/[^a-zA-Z0-9\s]/', '', $userMessage));

        foreach ($data['intents'] as $intent) {
            foreach ($intent['patterns'] as $pattern) {
                // Remove punctuation and convert to lowercase for each pattern
                $pattern = strtolower(preg_replace('/[^a-zA-Z0-9\s]/', '', $pattern));

                if (strpos($userMessage, $pattern) !== false || strpos($pattern, $userMessage) !== false) {
                    $responses = $intent['responses'];
                    $randomIndex = array_rand($responses);
                    return $responses[$randomIndex];
                }
            }
        }

        return $userMessage;
    }
}
