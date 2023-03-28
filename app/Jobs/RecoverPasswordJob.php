<?php

namespace App\Jobs;

use App\Mail\RecoverPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RecoverPasswordJob implements ShouldQueue
{
    use  InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    public $url;

    /**
     * @var
     */
    public $email;


    /**
     * UserRegisterMail constructor.
     * @param $password
     * @param $email
     */
    public function __construct($url, $email)
    {
        $this->url = $url;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new RecoverPassword($this->url));
    }
}
