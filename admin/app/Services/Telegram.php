<?php

namespace App\Services;

use GuzzleHttp\Client;
use http\Env\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\ConfigSystem;

/**
 *
 */
Class Telegram
{
    protected $configSystem;

    public function __construct() {
        $this->configSystem = new ConfigSystem();
    }

    public function sendTelegramTest($telegram_url, $telegram_token, $telegram_chat_id)
    {
        try {
            $data_chat = [
                'chat_id' => $telegram_chat_id,
                'text' => 'Kiểm tra kết nối telegram'
            ];
            $url = $telegram_url . $telegram_token . '/sendMessage?' . http_build_query($data_chat) . '&parse_mode=html';

            $client = new Client();
            $response = $client->get($url);

            if ($response->getStatusCode() == 200) {
                Log::info("Gửi tin nhắn đến telegram thành công");
            }
            elseif ($response->getStatusCode() == 201) {
                Log::info("Gửi tin nhắn đến telegram thành công");
            }
            else {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

}

