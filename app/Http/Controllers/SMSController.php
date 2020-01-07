<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;
use App\User;

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
        $message = "You've got: ".$request->correct;


        // Prepare a message
        //114333
        $sendMessageRequest = new SendMessageRequest([
            'phoneNumber' => $userPhoneNumber,
            'message' => $message,
            'deviceId' => 114506
        ]);
    
        // Send the message
        $messageClient->sendMessages([$sendMessageRequest]);

        return response()->json(['success' => true]);
    }
}
