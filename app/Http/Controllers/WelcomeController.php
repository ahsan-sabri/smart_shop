<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\CategorySlide;
use App\Logo;
use App\Slide;
use Cart;

class WelcomeController extends Controller {

    //
    public function showCartContents() {
        $cartContents = Cart::content();
        return $cartContents;
    }

    public function index() {
        $slides = Slide::all();
        $publishedProducts = Product::where('publicationStatus', 0)->get();
        return view('frontEnd.home.homeContent', ['productsToShow' => $publishedProducts])
                        ->with('slides', $slides)
                        ->with('cartItems', $this->showCartContents());
    }

    public function category($id) {
        $category = Category::where('id', $id)->first();
        $categorySlides = CategorySlide::where('categoryId', $id)->get();
        $publishedProductbyCategory = Product::where('publicationStatus', 0)
                ->where('categoryId', $id)
                ->get();
        return view('frontEnd.category.categoryContent', ['productsByCategory' => $publishedProductbyCategory])
                        ->with(['category' => $category])
                        ->with('cartItems', $this->showCartContents())
                        ->with('categorySlides', $categorySlides);
        ;
    }

    public function contact() {
        return view('frontEnd.contact.contactContent')
                        ->with('cartItems', $this->showCartContents());
    }

    public function details($id) {
        $productById = Product::where('id', $id)->first();
        return view('frontEnd.details.detailsContent')
                        ->with('product', $productById)
                        ->with('cartItems', $this->showCartContents());
    }

    public function cart() {
        return view('frontEnd.checkout.cartContent')
                        ->with('cartItems', $this->showCartContents());
    }

}
