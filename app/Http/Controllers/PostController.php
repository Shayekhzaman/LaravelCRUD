<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view("create");
    }

    public function ourFilestore(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // image validation
        ]);

        // Create a new Post instance
        $post = new Post;
        $post->name = $validated['name'];
        $post->description = $validated['description'];

        // Handle the image upload if image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public'); // stores inside storage/app/public/uploads
            $post->image = $imagePath; // save image path to DB
        }

        $post->save();
        return redirect()->route('home')->with("success", "Post Created Successfully");
    }
}
