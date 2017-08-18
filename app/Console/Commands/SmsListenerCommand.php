<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mookofe\Tail\Facades\Tail;

use Illuminate\Support\Facades\Mail;

use Twilio\Rest\Client;

class SmsListenerCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'sms:listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run SMS Listener.';

    private $data = [];


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        echo '====== Start Listening SMS Sending ======';
        Tail::listen('send-sms', function ($message) {
            $sid = env('TWILIO_SID'); // Your Account SID from www.twilio.com/console
            $token = env('TWILIO_TOKEN'); // Your Auth Token from www.twilio.com/console
            $this->data = json_decode($message, true);
            
            $client = new Client($sid, $token);
            $message = $client->messages->create(
              $this->data['phone_number'], // Text this number
              array(
                'from' => env('TWILIO_PHONE_NUMBER'), // From a valid Twilio number
                'body' => 'Hello from Twilio!'
              )
            );

            echo "\r\SMS has been sent to ".$this->data['phone_number'];
        });
    }

}
