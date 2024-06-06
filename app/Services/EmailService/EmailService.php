<?php

namespace App\Services\EmailService;

use App\Exceptions\CustomException;
use App\Mail\EmailNotificationService;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailService implements EmailServiceInterface
{
    public function sendEmail($params = [])
    {
        if (!\array_key_exists("receiver", $params)) {
            throw new Exception("receiver parameter is required");
        }

        if (!\array_key_exists("view", $params)) {
            throw new Exception("view parameter is required");
        }

        Mail::to($params["receiver"])->send(new EmailNotificationService(
            $params["subject"],
            $params["view"],
            $params["withData"] ?? [],
        ));
    }
}
