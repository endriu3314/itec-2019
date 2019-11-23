<?php

namespace App\Http\Controllers;

use App\Category;
use App\Handlers\ErrorHandler;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCategories(Request $request){
        $res = null;

        try {
            $res = Category::all()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('104');
        }

        return $res;
    }

    public function getSubCategoriesWithName(Request $request){
        $res = null;

        try {
            //$res = SubCategory::all()->toJson();
            $res = DB::table('subcategory')
                ->join('category', 'category.id', '=', 'subcategory.category_id')
                ->select('category.id', 'category.name as categoryName', 'subcategory.id', 'subcategory.name', 'subcategory.category_id')
                ->get();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('104');
        }

        return $res;
    }

    public function getSubCategories(Request $request){
        $res = null;

        try {
            $res = SubCategory::all()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('104');
        }

        return $res;
    }

    public function getSubCategorieName(Request $request){
        $res = null;

        try {
            $res = SubCategory::find($request->id)->category;
        } catch (Exception $e){
            $res = ErrorHandler::getErrorResponse('104');
        }

        return $res;
    }

    public function createCategory(Request $request){
        $category = new Category();

        $request->validate([
            'name' => 'required|string',
        ]);

        try {
            $category->name = $request->name;
            $category->save();
            $result = $category;
        } catch (Exception $e) {
            $result = ErrorHandler::getErrorResponse('105');
        }

        return $result;
    }

    public function createSubCategory(Request $request){
        $subcategory = new SubCategory();

        $request->validate([
            'categoryid' => 'required|integer',
            'name' => 'required|string',
        ]);

        try{
            $subcategory->category_id = $request->categoryid;
            $subcategory->name = $request->name;
            $subcategory->save();
            $result = $subcategory;
        } catch (Exception $e) {
            $result = ErrorHandler::getErrorResponse('105');
        }
        return $result;
    }
}
