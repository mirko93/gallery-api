<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    public function store()
    {
        Gallery::create($this->validateRequest());
    }

    public function update(Gallery $gallery)
    {
        $gallery->update($this->validateRequest());
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete($gallery);
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:2|max:255',
            'desc' => 'required|max:1000',
            'imageUrl' => 'required|image|mimes:png,jpg'
        ]);
    }
}
