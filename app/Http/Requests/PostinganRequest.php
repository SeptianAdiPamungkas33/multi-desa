<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostinganRequest extends FormRequest
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
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            // 'gambar' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar' => 'sometimes|file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000', // Validasi gambar dan video
        ];
    }
}
