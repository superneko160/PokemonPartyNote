<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePartyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  // ここfalseだと403
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // バリデーションが効いていない
        return [
            'name' => 'max:24',
            'ability' => 'max:24',
            'item' => 'max:24',
            'teratype' => 'max:24',
            'nature' => 'max:24',
            'h' => 'min:0|max:252',
            'a' => 'min:0|max:252',
            'b' => 'min:0|max:252',
            'c' => 'min:0|max:252',
            'd' => 'min:0|max:252',
            's' => 'min:0|max:252',
            'move1' => 'max:24',
            'move2' => 'max:24',
            'move3' => 'max:24',
            'move4' => 'max:24',
            'note' => 'max:255'
        ];
    }

    /**
     * ほかの項目はlang/ja/validation参照
     */
    public function attributes()
    {
        return [
            'name' => 'ポケモンの名前',
        ];
    }
}
