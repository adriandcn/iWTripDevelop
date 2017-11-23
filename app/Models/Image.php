<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public static $rules = [
        
        'file'=>'required|image|mimes:jpeg,jpg'
    ];

    public static $messages = [
        'file.mimes' => 'Uploaded file is not in image format .jpg',
        'file.required' => 'Image is required'
    ];
}