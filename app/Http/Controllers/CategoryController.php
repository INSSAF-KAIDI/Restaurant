<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::orderBy('id','DESC')->paginate(5);

        return view('category.index',['categories' => $categories]);
    }

    public function create() {
        return view('category.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'NomCategory' => 'required',
            'remise' => 'required',
            'image' => 'sometimes|image:gif,png,jpeg,jpg'
        ]);

        if ( $validator->passes() ) {

            // option #1
            // Save data here
            // $category = new Category();
            // $category ->NomCategory = $request->NomCategory;
            // $category ->remise= $request->remise;
            // $category ->description = $request->description;
            // $category ->save();

            // option #2
            // $category= new Category();
            // $category->fill($request->post())->save();

            // option #3
            $category = Category::create($request->post());

            // Upload image here
            if ($request->image) {
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/categories/',$newFileName); // This will save file in a folder
                
                $category->image = $newFileName;
                $category->save();
            }
            
            // return redirect()->route('categories.index')->with('success','Category added successfully.');
            return redirect()->route('admin/categories')->with('success', 'Category added successfully');


        } else {
            // return with errrors
            return redirect()->route('categories.create')->withErrors($validator)->withInput();
        }
    }

   
    public function edit(Category $category) {
        //$category = Category::findOrFail($id);       
        return view('category.edit',['category' => $category]);
    }

    public function update(Category $category, Request $request) {

        $validator = Validator::make($request->all(),[
            'NomCategory' => 'required',
            'remise' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ( $validator->passes() ) {
           

            $category->fill($request->post())->save();

            // Upload image here
            if ($request->image) {
                $oldImage = $category->image;

                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/categories/',$newFileName); // This will save file in a folder
                
                $category->image = $newFileName;
                $category->save();

                // File::delete(public_path().'/uploads/categories/'.$oldImage);
            }            

            // return redirect()->route('categories.index')->with('success','Category updated successfully.');
            return redirect()->route('admin/categories')->with('success', 'category updated successfully');

        } else {
            // return with errrors
            return redirect()->route('categories.edit',$category->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(Category $category, Request $request) {
                       
        File::delete(public_path().'/uploads/categories/'.$category->image);
        $category->delete();        
        // return redirect()->route('categories.index')->with('success','Category deleted successfully.');
        return redirect()->route('admin/categories')->with('success', 'category deleted successfully');
    }
}
