<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function AllCategory(){
        $categories = Category::all();
        return view('backend.category.category_all', compact('categories'));
    }

    public function AddCategory(){
        return view('backend.category.category_add');
    }


    public function StoreCategory(Request $request){

        $request->validate([
            'category_name' => 'required',
            'minimum_amount' => 'required',
            'duration_value' => 'required',
            'duration_unit' => 'required'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'minimum_amount' => $request->minimum_amount,
            'duration_value' => $request->duration_value,
            'duration_unit' => $request->duration_unit
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }

        public function EditCategory($id){
            $category = Category::findOrFail($id);
            return view('backend.category.category_edit', compact('category'));
        }

        public function UpdateCategory(Request $request, $id){

            $request->validate([
                'category_name' => 'required',
                'minimum_amount' => 'required',
                'duration_value' => 'required',
                'duration_unit' => 'required'
            ]);

            Category::findOrFail($id)->update([
                'category_name' => $request->category_name,
                'minimum_amount' => $request->minimum_amount,
                'duration_value' => $request->duration_value,
                'duration_unit' => $request->duration_unit
            ]);

            $notification = array(
                'message' => 'Category Updated Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);
        }

        public function DeleteCategory($id){
            Category::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Category Deleted Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);
        }
}
