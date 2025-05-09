<?php

namespace App\Http\Requests {

    use Illuminate\Foundation\Http\FormRequest;

    class UploadProfilePhoto extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize(): bool
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string>
         */
        public function rules(): array
        {
            return [
                'profile_image' => 'required|file|mimes:jpg,png,webp',
            ];
        }

        /**
         * @inheritdoc
         */
        public function messages(): array
        {
            return [
                'profile_image.required' => 'Please select an image from your hard drive in order to complete this request',
            ];
        }
    }
}
