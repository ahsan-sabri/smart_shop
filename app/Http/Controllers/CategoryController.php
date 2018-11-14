<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategorySlide;
use DB;  // for query builder method

class CategoryController extends Controller {

    //
    public function createCategory() {
        return view('admin.category.addCategoryContent');
    }

    public function saveCategory(Request $request) {

        $this->validate($request, [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'categoryImage' => 'required',
        ]);

//        eloquent ORM

        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;

        $categoryImage = $request->file('categoryImage');
        $imageName = $categoryImage->getClientOriginalName();
        $imageDirectory = 'public/images/category/';
        $categoryImage->move($imageDirectory, $imageName);
        $imageUrl = $imageDirectory . $imageName;
        $category->categoryImage = $imageUrl;
        $category->save();

        //eloquent ORM    
//        Category::create($request->all());
//        return 'Category created successfully';
//        
        //query builder
//        DB::table('categories')->insert([
//            'categoryName' => $request->categoryName,
//            'categoryDescription' => $request->categoryDescription,
//            'publicationStatus' => $request->publicationStatus,
//        ]);
        return redirect()->back()->with('message', 'Category created successfully');
    }

    public function manageCategory() {
        $categorySlides = DB::table('category_slides')
                ->join('categories', 'category_slides.categoryId', '=', 'categories.id')
                ->select('category_slides.*', 'categories.categoryName')
                ->get();
        $categories = Category::all();
        return view('admin.category.manageCategoryContent')
                        ->with('categories', $categories)
                        ->with('categorySlides', $categorySlides);
    }

    public function editCategory($id) {
        $categoryInfoById = Category::where('id', $id)->first();
        return view('admin.category.editCategoryContent', ['categoryInfo' => $categoryInfoById]);
    }

    public function updateCategory(Request $request) {
//        dd($request->all());
        $category = Category::find($request->categoryId);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;

        $categoryImage = $request->file('categoryImage');
        if ($categoryImage) {
            unlink($category->categoryImage);
            $imageName = $categoryImage->getClientOriginalName();
            $imageDirectory = 'public/images/category/';
            $categoryImage->move($imageDirectory, $imageName);
            $imageUrl = $imageDirectory . $imageName;
        } else {
            $imageUrl = $category->categoryImage;
        }
        $category->categoryImage = $imageUrl;
        $category->save();
        return redirect('/category/manage')->with('updateSuccess', 'Category info updated successfully');
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('deleteSuccess', 'Category info deleted successfully');
    }

    public function saveCategorySlide(Request $request) {
        $this->validate($request, [
            'categoryId' => 'required',
            'categorySlide' => 'required',
        ]);

        $categorySlides = new CategorySlide();
        $categorySlides->categoryId = $request->categoryId;

        $categorySlideImage = $request->file('categorySlide');
        $imageName = $categorySlideImage->getClientOriginalName();
        $imageDirectory = 'public/images/category/';
        $categorySlideImage->move($imageDirectory, $imageName);
        $imageUrl = $imageDirectory . $imageName;

        $categorySlides->categorySlide = $imageUrl;
        $categorySlides->save();
        return redirect()->back()->with('slideUploadMessage', 'Category slide added successfully');
    }

    public function editCategorySlide($id) {
        $categories = Category::all();
        $categorySlideById = CategorySlide::where('id', $id)->first();
        return view('admin.category.editCategorySlideContent', ['slide' => $categorySlideById])
                        ->with('categories', $categories);
    }

    public function updateCategorySlide(Request $request) {
        $this->validate($request, [
            'categorySlide' => 'required',
        ]);

        $categorySlide = CategorySlide::find($request->slideId);
        $categorySlide->categoryId = $request->categoryId;
        $categorySlideImage = $request->file('categorySlide');

        if ($categorySlideImage) {
            unlink($categorySlide->categorySlide);
            $imageName = $categorySlideImage->getClientOriginalName();
            $imageDirectory = 'public/images/category/';
            $categorySlideImage->move($imageDirectory, $imageName);
            $imageUrl = $imageDirectory . $imageName;
        } else {
            $imageUrl = $categorySlide->categorySlide;
        }

        $categorySlide->categorySlide = $imageUrl;
        $categorySlide->save();
        return redirect('/category/manage')->with('slideUpdateMessage', 'Category slide updated successfully');
    }
    
    public function deleteCategorySlide($id) {
        $categorySlide = CategorySlide::find($id);
        $categorySlide->delete();
        return redirect('/category/manage')->with('deleteSuccess', 'Category slide deleted successfully');
    }

}
