<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageViewController extends Controller
{

    protected $image;
    public function __construct(){
        $this->image = new Images();
    }

    public function index()
    {
        $response['images'] = $this->image->all();
        return view('pages.images.index')->with($response);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'room_id' => 'required|exists:rooms,id',
            ]);

            $imagePath = $request->file('image')->store('public/images');
            Images::create([
                'room_id' => $request->room_id,
                'image_path' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Image uploaded successfully');
        } catch (\Exception $e) {

            // Handle the error and return a response
            return redirect()->back()->with('error', 'An error occurred while uploading the image.');
        }

    }
    public function destroy(string $id)
    {
        $image = $this->image->find($id);
        $image->delete();
        Storage::delete($image->image_path);
        return redirect('imagesview');
    }
}
