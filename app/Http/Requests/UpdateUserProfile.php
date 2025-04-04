<?php

namespace App\Http\Requests {

    use Illuminate\Foundation\Http\FormRequest;

    class UpdateUserProfile extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         */
        public function authorize(): bool
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
        public function rules(): array
        {
            return [
                'profile_image' => ['string', 'nullable'],
                'password'      => ['string', 'nullable'],
                'address'       => ['string', 'nullable'],
                'phone'         => ['string', 'nullable'],
                'email'         => ['string', 'nullable', 'unique:users,email'],
                'name'          => ['string', 'nullable'],
            ];
        }
    }
}
