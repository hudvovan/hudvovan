<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                'theme_news' => 'required|max:100',
                'text_news' => 'required|max:2000',
                'date_news' => 'required|date'
        ];
    }

    public function messages() {
        return [
            "theme_news.required" => "НЕ заполнено поле Тема новости",
            "text_news.required" => "НЕ заполнено поле Текст новости",
            "date_news.required" => "НЕ заполнено поле Датa новости",
            "theme_news.max" => "Превышен объём символов поля Тема новости (не более 100)",
            "text_news.max" => "Превышен объём символов поля Тема новости (не более 2000)",
            
        ];
    }
}
