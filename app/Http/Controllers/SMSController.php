<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Model\SendMessageRequest;

class SMSController extends Controller
{
    /**
     * Display the send form of the SMS function
     */
    public function sendForm()
    {
        return view('admin.sms.send-form');
    }


    /**
     * Send a SMS message
     * Note that this function will strictly need an token from it's website
     * and deviceId from app installed in phone.
     * Internet connection is required.
     */
    public function send(Request $request)
    {

        // Configure client
        $config = Configuration::getDefaultConfiguration();
        $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU3NDg2NzQ2OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY1MDk1LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.4mrjxsdz85Ip1mP4rv6XiFnPeC5FZgA3EtI4VTAqsQ4');
        $apiClient = new ApiClient($config);
        $messageClient = new MessageApi($apiClient);

        // Get the phone number of examinee
        $userPhoneNumber = User::find($request->examinee_id)->cellnumber;

        $appellation = Auth::user()->gender === 'male' ? 'Mr.' : 'Ms.';

        // Prepare a message
        $sendMessageRequest = new SendMessageRequest([
            'phoneNumber' => $userPhoneNumber,
            'message' => "Hello " . $appellation . Auth::user()->name . " here's your score in SDSSU Entrance Examination \nCorrect: ".count($request->correct)."\nWrong: ". count($request->wrong) . "\nPlease don't reply to this message.",
            'deviceId' => 114313
        ]);
    
        // Send the message
        $messageClient->sendMessages([$sendMessageRequest]);

        return response()->json(['success' => true]);
    }
}
