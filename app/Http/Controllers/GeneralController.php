<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
use App\Slide;
use DB;

class GeneralController extends Controller {

    //
    public function uploadLogo() {
        $logo = Logo::where('id', 1)->first();
        return view('admin.general.uploadLogoContent')->with('logo', $logo);
    }

//    public function uploadNewLogo(Request $request) {
//        
//        $this->validate($request, ['logo' => 'required']);
//
//        $logo = new Logo();
//        $logoImage = $request->file('logo');
//        $imageName = $logoImage->getClientOriginalName();
//        $imageDirectory = 'public/images/logo/';
//        $logoImage->move($imageDirectory, $imageName);
//        $imageUrl = $imageDirectory . $imageName;
//        $logo->logo = $imageUrl;
//        $logo->save();
//        return redirect('/logo')->with('message', 'Logo uploaded successfully!');
//    }

    public function changeLogo($id) {
        $logo = Logo::where('id', $id)->first();
        return view('admin.general.updateLogoContent')->with('logo', $logo);
    }

    public function updateLogo(Request $request) {
        $logo = Logo::where('id', $request->id)->first();

        $logoImage = $request->file('logo');
        if ($logoImage) {
            unlink($logo->logo);
            $imageName = $logoImage->getClientOriginalName();
            $imageDirectory = 'public/images/logo/';
            $logoImage->move($imageDirectory, $imageName);
            $imageUrl = $imageDirectory . $imageName;
        } else {
            $imageUrl = $logo->logo;
        }
        $logo->logo = $imageUrl;
        $logo->save();
        return redirect('/logo')->with('message', 'Logo updated successfully');
    }

    public function uploadNewSlide(Request $request) {

        $this->validate($request, ['slide' => 'required']);

        $slides = new Slide();
        $slideImage = $request->file('slide');
        $imageName = $slideImage->getClientOriginalName();
        $imageDirectory = 'public/images/slide/';
        $slideImage->move($imageDirectory, $imageName);
        $imageUrl = $imageDirectory . $imageName;
        $slides->slide = $imageUrl;
        $slides->save();
        return redirect('/slider')->with('message', 'Slide image uploaded successfully!');
    }

    public function showAllSlides() {
        $allSlides = Slide::all();
        return view('admin.general.uploadSlideContent')
                        ->with('slides', $allSlides);
    }

    public function changeSlide($id) {
        $slideById = Slide::where('id', $id)->first();
        return view('admin.general.updateSlideContent')->with('slide', $slideById);
    }

    public function updateSlide(Request $request) {
        $slideById = Slide::where('id', $request->id)->first();

        $slideImage = $request->file('slide');
        if ($slideImage) {
            unlink($slideById->slide);
            $imageName = $slideImage->getClientOriginalName();
            $imageDirectory = 'public/images/slide/';
            $slideImage->move($imageDirectory, $imageName);
            $imageUrl = $imageDirectory . $imageName;
        } else {
            $imageUrl = $slideById->slide;
        }
        $slideById->slide = $imageUrl;
        $slideById->save();
        return redirect('/slider')->with('message', 'Slide image updated successfully.');
    }

    public function deleteSlide($id) {
        $slideById = Slide::find($id);
        $slideById->delete();
        return redirect('/slider')->with('message', 'Slide deleted successfully.');
    }

}
