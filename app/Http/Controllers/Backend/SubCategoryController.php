<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){

        $categories  = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory','categories'));
    }

    public function SubCategoryStore(Request $request){

        $request->validate([
            'category_id'            => 'required',
            'subcategory_name_en'    => 'required',
            'subcategory_name_ind'   => 'required',
        ],[
            'category_id.required'          => 'Please select category name',
            'subcategory_name_en.required'  => 'Input SubCategory Name English',
            'subcategory_name_ind.required'  => 'Input SubCategory Name Indonesia',
        ]);

        SubCategory::insert([
            'category_id'             => $request->category_id,
            'subcategory_name_en'     => $request->subcategory_name_en,
            'subcategory_name_ind'    => $request->subcategory_name_ind,
            'subcategory_slug_en'     => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_ind'    => strtolower(str_replace(' ', '-',$request->subcategory_name_ind)),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){

        $categories  = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request){

        $subcat_id  = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id'             => $request->category_id,
            'subcategory_name_en'     => $request->subcategory_name_en,
            'subcategory_name_ind'    => $request->subcategory_name_ind,
            'subcategory_slug_en'     => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_ind'    => strtolower(str_replace(' ', '-',$request->subcategory_name_ind)),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // Controller Sub Sub Category

    public function SubSubCategoryView(){

        $categories  = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategory','categories'));
    }

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){

        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }

    public function SubSubCategoryStore(Request $request){

        $request->validate([
            'category_id'               => 'required',
            'subcategory_id'            => 'required',
            'subsubcategory_name_en'    => 'required',
            'subsubcategory_name_ind'   => 'required',
        ],[
            'category_id.required'              => 'Please select category name',
            'subsubcategory_name_en.required'   => 'Input Sub-SubCategory Name English',
            'subsubcategory_name_ind.required'  => 'Input Sub-SubCategory Name Indonesia',
        ]);

        SubSubCategory::insert([
            'category_id'                => $request->category_id,
            'subcategory_id'             => $request->subcategory_id,
            'subsubcategory_name_en'     => $request->subsubcategory_name_en,
            'subsubcategory_name_ind'    => $request->subsubcategory_name_ind,
            'subsubcategory_slug_en'     => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_ind'    => strtolower(str_replace(' ', '-',$request->subsubcategory_name_ind)),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){

        $categories         = Category::orderBy('category_name_en','ASC')->get();
        $subcategories      = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories   = SubSubCategory::findOrFail($id);
        return view('backend.category.Sub_subcategory_edit', compact('categories','subcategories','subsubcategories'));
    }

    public function SubSubCategoryUpdate(Request $request){

        $subsubcat_id  = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id'                => $request->category_id,
            'subcategory_id'             => $request->subcategory_id,
            'subsubcategory_name_en'     => $request->subsubcategory_name_en,
            'subsubcategory_name_ind'    => $request->subsubcategory_name_ind,
            'subsubcategory_slug_en'     => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_ind'    => strtolower(str_replace(' ', '-',$request->subsubcategory_name_ind)),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
