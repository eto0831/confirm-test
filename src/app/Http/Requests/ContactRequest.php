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
            'last_name' => ['required', 'string','max:255'],
            'first_name' => ['required', 'string','max:255'],
            'email' => ['required','string', 'email', 'max:255'],
            'tell_1' => ['required', 'numeric', 'digits_between:1,5'],
            'tell_2' => ['required', 'numeric', 'digits_between:1,5'],
            'tell_3' => ['required', 'numeric', 'digits_between:1,5'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'building' => ['max:255'],
            'last_name' => ['required', 'string','max:255'],
            'detail' => ['required', 'string','max:120'],
            'category_id' => ['required'],
        ];
    }

    public function messages(){
        return [
            'last_name.required' => '性を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'address.required' => '住所を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tell_1.required' => '電話番号を入力してください',
            'tell_1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tell_2.required' => '電話番号を入力してください',
            'tell_2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tell_3.required' => '電話番号を入力してください',
            'tell_3.digits_between' => '電話番号は5桁までの数字で入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください'
        ];
    }
}
