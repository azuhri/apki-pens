<?php

namespace App\Services\EmailService;

interface EmailServiceInterface
{
    public function sendEmail($params = []);
}
