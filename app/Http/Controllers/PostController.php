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
        // upload image
        $imageName = time() . '.' . $request->image->extension(); // Generate a unique name for the image
        $request->image->move(public_path('images'), $imageName); // Move the image to the public/images directory

        // Create a new Post instance
        $post = new Post;
        $post->name = $validated['name'];
        $post->description = $validated['description'];
        $post->image = $imageName;

        // Handle the image upload if image is provided
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('uploads', 'public'); // stores inside storage/app/public/uploads
        //     $post->image = $imagePath; // save image path to DB
        // }

        $post->save();
        return redirect()->route('home')->with("success", "Post Created Successfully");
    }

    public function editData($id, Request $request)
    {
        $post = Post::findOrFail($id);
        return view("edit", ["editablePost" => $post]);
    }

    public function updateData(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // image validation
        ]);

        $post = Post::findOrFail($id);
        $post->name = $validated['name'];
        $post->description = $validated['description'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension(); // unique name
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('home')->with('success', 'Post Updated Successfully!');
    }

    public function deleteData($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Post Deleted Successfully!');
    }
}
