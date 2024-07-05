<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Models\Website;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $slider = Slider::where('website_id', $website->id)->get();

        return view('website.slider.index', [
            'title' => 'Edit Data Tentang Kami',
            'slider' => $slider,
        ]);
    }

    public function create()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $slider = Slider::where('website_id', $website->id)->get();

        return view('website.slider.create', [
            'title' => 'Tambah slider',
            'case' => 'post',
            'slider' => $slider
        ]);
    }

    public function store(SliderRequest $request)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName; // Store relative path

            // Assign image path to validated data
            $validatedData['image'] = $imagePath;
        }

        // Automatically assign website_id
        $validatedData['website_id'] = Website::where('user_id', auth()->user()->id)->first()->id;

        // Create the slider record
        $slider = Slider::create($validatedData);

        if ($slider) {
            return redirect()->route('slider.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('slider.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        $website = Website::where('user_id', auth()->user()->id)->first();

        return view('website.slider.edit', [
            'title' => 'Edit slider',
            'case' => 'put',
            'slider' => $slider
        ]);
    }

    public function update(SliderRequest $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Find the slider record
        $slider = Slider::find($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image file
            if (file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName; // Store relative path

            // Assign image path to validated data
            $validatedData['image'] = $imagePath;
        }

        $validatedData['website_id'] = Website::where('user_id', auth()->user()->id)->first()->id;

        // Update the slider record
        $result = $slider->update($validatedData);

        if ($result) {
            return redirect()->route('slider.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('slider.index')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);

        // Delete the image file
        if (file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }

        // Delete the slider record
        $result = $slider->delete();

        if ($result) {
            return redirect()->route('slider.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('slider.index')->with('error', 'Data gagal dihapus');
        }
    }
}
