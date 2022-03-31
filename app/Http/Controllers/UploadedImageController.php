<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia; 

use App\Models\UploadedImages;

class UploadedImageController extends Controller
{
    public function index()
    {
        return Inertia::render('UploadedImage/Index', ['images' => UploadedImages::all()]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);
        
        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        
        $newImage = new UploadedImages();
        $newImage->path = $fileName;
        
        $newImage->save();
        
        return redirect()->route('images.index');
    }
    
    public function destroy($image_id)
    {
        $fileName = UploadedImages::find($image_id)->path;
        
        UploadedImages::destroy($image_id);
        Storage::delete($fileName);
        
        return redirect()->route('images.index');
    }
}
