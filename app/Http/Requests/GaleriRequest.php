<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleriRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'judul_galeri' => 'required|string|max:255',
            'filename.*' => 'sometimes|file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000', // Validasi gambar dan video
        ];
    }
}
