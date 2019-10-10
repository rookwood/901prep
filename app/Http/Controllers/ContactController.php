<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\CustomerContact;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    /**
     * @var Mailer
     */
    protected $mail;

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    public function create(ContactRequest $request)
    {
        list($name, $phone, $email, $message) = array_values($request->only(['name', 'phone', 'email', 'message']));

        if (str_contains($message, 'http')) {
            // Likely spam
            Log::info('------------Likely spam message------------');
            Log::info("Mail request from {$name} ({$phone}})");
            Log::info("Did not send email from {$email} with attached message: {$message}");
            Log::info("-----------------------------------------------------------");

            return Response::json('Sorry, this looks like spam.  We don\'t allow URLs in contact info', 422);
        }

        try {
            $this->mail->to(config('mail.contactEmail'))
                ->send(new CustomerContact($name, $phone, $email, $message));

            Log::info("Mail request from {$name} ({$phone}})");
            Log::info("Sent email from {$email} with attached message: {$message}");
            Log::info("-----------------------------------------------------------");

            return Response::json('Message sent', 201);
        } catch (Exception $e) {
            return Response::json($e->getMessage(), 500);
        }
    }
}
