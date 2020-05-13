<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use GuzzleHttp\Client;
use App\Http\Repository\ExamineeResultRepository;


class SMSController extends Controller
{
    private $client;
    public function __construct(ExamineeResultRepository $examineeRepo)
    {
        $this->client = new Client();
        $this->examineeRepo = $examineeRepo;
    }
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
        $request->type_correct ?? [];
        
        Auth::user()->examResult()->updateOrCreate(
            $this->examineeRepo->processCorrectByQuestionType($request->type_correct)
        );
        

        // Get the phone number of examinee
        $userPhoneNumber = User::find($request->examinee_id)->cellnumber;
        // $message = "You've got: ".$request->correct;

        $appellation = Auth::user()->gender === 'male' ? 'Mr.' : 'Ms.';
        
        // Credentials need for authenticating in SDGateway
        $credentials = ['Authorization' => 'bearer' . ' ' . config('sms.token')];

        // Prepare a message
        $messageData = [
            'phone_number' => $userPhoneNumber,
            'message' => "Hello " . $appellation . Auth::user()->name . " here's your score in SDSSU Entrance Examination \nCorrect: ".$request->correct."\nWrong: ". $request->wrong . "\nPlease don't reply to this message.",
            'device_id' => config('sms.device_id')
        ];

        $this->client
            ->request('POST', 'https://sdgateway.herokuapp.com/api/device/send/message', ['headers' => $credentials, 'form_params' => $messageData]);

        return response()->json(['success' => true]);
    }
}
