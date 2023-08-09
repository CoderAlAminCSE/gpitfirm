<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceManagementController extends Controller
{

    /**
     * Display category information
     */
    public function categoryIndex(Request $request, Category $category)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $categories = $category->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('slug', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $categories = $category->latest()->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.category.index', compact('categories'));
    }



    /**
     * Create new category.
     */
    public function categoryStore(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->active = $request->active ? true : false;
            $category->save();
            return back()->with('success', 'Category added successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return back();
    }


    /**
     * Edit a category.
     */
    public function categoryEdit($id, Category $category)
    {
        $category = $category->findOrfail($id);
        return view('backend.category.edit', compact('category'));
    }


    /**
     * Update the category.
     */
    public function categoryUpdate(Request $request, Category $category, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $categoryToUpdate = $category->findOrFail($id);
            $categoryToUpdate->name = $request->name;
            $categoryToUpdate->slug = Str::slug($request->name);
            $categoryToUpdate->active = $request->active ? true : false;
            $categoryToUpdate->save();
            return redirect()->route('service.category.index')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    /**
     * Delete the category.
     */
    public function categoryDelete(Category $category, $id)
    {
        try {
            $categoryToDelete = $category->findOrFail($id);
            $categoryToDelete->delete();

            return response()->json(['success' => true, 'message' => 'Category deleted successfullyyy']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
