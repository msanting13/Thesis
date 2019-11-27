<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::with('questions')->get();
    	return view('admin.category', compact('categories'));
    }
    public function addCategory(Request $request)
    {
        $this->validate(request(),[
            'name'                     =>          'unique:tbl_categories',
        ],[
            'name.unique'              =>          'Category title is already exist'
        ]);

    	Category::create($request->all());
    	return redirect()->back();
    }
    public function editCategory(Request $request)
    {
    	$id = intval($request->id);
    	$category = Category::find($id);
    	return view('admin.crud.edit-category', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
		$category = Category::find($id);
		$category->update($request->all());
		return redirect()->back()->with('successMessage', 'Successfully updated');
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Successfully deleted');  
    }
}
