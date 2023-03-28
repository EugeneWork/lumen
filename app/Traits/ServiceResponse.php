<?php

namespace App\Traits;

trait ServiceResponse
{
    /**
     * @param $body
     * @return array
     */
    public function success($body): array
    {
        return [
            'status' => 'Success',
            'body' => $body
        ];
    }

    /**
     * @param $message
     * @return array
     */
    public function error($message): array
    {
        return [
            'status' => 'Error',
            'message' => $message
        ];
    }
}
