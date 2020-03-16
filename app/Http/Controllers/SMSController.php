<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use GuzzleHttp\Client;


class SMSController extends Controller
{
    private $client;
    public function __construct()
    {
        $this->client = new Client();
    }
    /**
     * Display the send form of the SMS function
     */
    public function sendForm()
    {
        return view('admin.sms.send-form');
    }

    
    public function processCorrectByQuestionType(array $correct) :array
    {
        $correctValues = [];
        foreach (array_keys($correct) as $value)  {
            // Changing the keys of an array into column name of tbl_examinee_result
            $values[] = str_replace(' ', '_', rtrim(substr(strtolower($value), 0, -1), '_'));
        }
        
        return array_count_values($values);    
    }
    

    /**
     * Send a SMS message
     * Note that this function will strictly need an token from it's website
     * and deviceId from app installed in phone.
     * Internet connection is required.
     */
    public function send(Request $request)
    {
        Auth::user()->examResult()->update(
            $this->processCorrectByQuestionType($request->type_correct)
        );

        

        // Get the phone number of examinee
        $userPhoneNumber = User::find($request->examinee_id)->cellnumber;
        // $message = "You've got: ".$request->correct;

        $appellation = Auth::user()->gender === 'male' ? 'Mr.' : 'Ms.';
        

        // Prepare a message
        $messageData = [
            'phone_number' => $userPhoneNumber,
            'message' => "Hello " . $appellation . Auth::user()->name . " here's your score in SDSSU Entrance Examination \nCorrect: ".$request->correct."\nWrong: ". $request->wrong . "\nPlease don't reply to this message.",
            'device_id' => 1
        ];

        $this->client
            ->request('POST', 'https://sdgateway.herokuapp.com/api/device/send/message', ['form_params' => $messageData]);

        return response()->json(['success' => true]);
    }
}
