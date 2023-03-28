<?php

namespace App\Services;

use App\Jobs\RecoverPasswordJob;

class EmailService
{
    /**
     * @param $url
     * @param $email
     * @return void
     */
    public function recover($url, $email)
    {
        dispatch(new RecoverPasswordJob($url, $email));
    }
}
