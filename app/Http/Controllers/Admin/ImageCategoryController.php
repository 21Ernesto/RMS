<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageCategoryController extends Controller
{
    public function edit(Category $category)
    {
        return view('admin.image.category', compact('category'));
    }

    public function update(Request $request, $category)
    {
        $category = Category::findOrFail($category);

        $validatedData = $request->validate([
            'image' => 'required|image',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }
            $imageName = 'category_' . time() . '.' . $request->image->extension();
            $request->file('image')->move(public_path('images/category'), $imageName);
            $validatedData['image'] = 'images/category/' . $imageName;
        }

        $category->update($validatedData);

        return redirect()->route('categories.index');
    }
}
