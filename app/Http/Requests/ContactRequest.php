<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                 => 'required',
            'email'                => 'required|email',
            'message'              => 'required',
            'phone'                => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    protected function sanitize()
    {
        $input = $this->all();

        if (preg_match("#https?://#", $input['url']) === 0) {
            $input['url'] = 'http://' . $input['url'];
        }

        $input['name']    = filter_var($input['name'], FILTER_SANITIZE_STRING);
        $input['email']   = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $input['message'] = filter_var($input['message'], FILTER_SANITIZE_STRING);
        $input['phone']   = $this->formatPhoneNumber($this->sanitizePhoneNumber($input['phone']));

        $this->replace($input);
    }

    protected function sanitizePhoneNumber($phone)
    {
        return preg_replace('/[^0-9]/', '', $phone);
    }

    public function formatPhoneNumber($phone)
    {
        if (strlen($phone) == 7) {
            // Add default local area code if none provided
            $phone = '901' . $phone;
        }

        return sprintf("%s.%s.%s", substr($phone, 0, 3), substr($phone, 3, 3), substr($phone, 6));
    }
}
