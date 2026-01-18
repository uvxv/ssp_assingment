<?php
namespace App\Notifications\Channels;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;


class Sms
{
    public function send($notifiable, Notification $notification)
    {
        $to = $notifiable->phone;
        $message = $notification->toSms($notifiable);

        $apiKey = config('services.sms.api_key');
        $reponse = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type' => 'application/json',
        ])
        ->post('https://app.text.lk/api/v3/sms/send', [
            'recipient' => $to,
            'sender_id' => 'ELicense',
            'type' => 'plain',
            'message' => $message,
        ]);

        $responseData = $reponse->json();

        if($responseData['status'] !== 'success') {
            Log::error('SMS sending failed: ' . $responseData['message']);
            return;
        }

        return;
    }
}