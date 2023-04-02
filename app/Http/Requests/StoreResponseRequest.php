<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

/**
 * The StoreResponseRequest class is responsible for handling incoming requests to store a new response.
 * It extends the FormRequest class provided by Laravel, and includes validation rules and error messages
 * for the request parameters.
 */
class StoreResponseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     *         Always returns true, as authorization is handled elsewhere.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *         An array of validation rules for each request parameter.
     */
    public function rules()
    {
        return [
            'type' => [
                'required',
                Rule::in([1, 2, 3]) // Add your allowed values here.
            ],
            'submission_id' => [
                'required',
                'exists:submissions,id'
            ],
            'content' => [
                'nullable',
                'string',
                'max:255',
            ],
            'author_id' => [
                'required',
                'integer',
                'exists:users,id'
            ],
            'assigned_id' => [
                'nullable',
                'integer',
                'exists:users,id'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     *         An array of error messages for each validation rule.
     */
    public function messages()
    {
        return [
            'type.required' => 'Pole typu jest wymagane.',
            'type.in' => 'Nieprawidłowa wartość typu.',
            'submission_id.required' => 'Pole ID zgłoszenia jest wymagane.',
            'submission_id.exists' => 'Zgłoszenie nie zostało odnalezione.',
            'content.string' => 'Pole treści musi być ciągiem znaków.',
            'content.max' => 'Pole treści nie może przekroczyć :max znaków.',
            'author_id.required' => 'Pole ID autora jest wymagane.',
            'author_id.integer' => 'Pole ID autora musi być liczbą całkowitą.',
            'author_id.exists' => 'Autor nie został odnaleziony.',
            'assigned_id.integer' => 'Pole ID przypisanego użytkownika musi być liczbą całkowitą.',
            'assigned_id.exists' => 'Przypisany użytkownik nie został odnaleziony.'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * This method is called before validation is performed. Here, we merge the URL parameters with
     * the request data so that validation rules are applied to both sets of data.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'type' => $this->route('type'),
            'submission_id' => $this->route('submission_id'),
            'author_id' => Auth::id(),
        ]);
    }
}
