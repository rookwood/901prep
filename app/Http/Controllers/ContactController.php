<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\CustomerContact;
use Illuminate\Contracts\Mail\Mailer;
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

        try {
            $this->mail->to(config('mail.contactEmail'))
                ->send(new CustomerContact($name, $phone, $email, $message));

            return Response::json('Message sent', 201);
        } catch (Exception $e) {
            return Response::json($e->getMessage(), 500);
        }
    }
}
