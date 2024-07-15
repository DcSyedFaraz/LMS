<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Spatie\PdfToImage\Pdf;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libraries = Library::all();
        return view('library.index', compact('libraries'));
    }

    public function show(Library $library)
    {
        return view('library.show', compact('library'));
    }

    public function download(Library $library)
    {
        return Storage::download($library->path);
    }

    public function adminIndex()
    {
        $libraries = Library::all();
        return view('admin.library.index', compact('libraries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf'
        ]);
        DB::beginTransaction();

        $fileName = time() . $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('pdfs', $fileName, 'public');
        $pdf = Library::create([
            'title' => $request->title,
            'path' => $path
        ]);

        // $this->generateThumbnail($pdf);
        DB::commit();
        return redirect()->route('library.index')->with('success', 'Book uploaded successfully.');
    }

    // protected function generateThumbnail(Library $lib)
    // {
    //     $pdfPath = storage_path("app/{$lib->path}");
    //     $thumbnailPath = "thumbnails/{$lib->id}.jpg";

    //     if (extension_loaded('imagick')) {
    //         echo "Imagick is loaded!";
    //     } else {
    //         echo "Imagick is not loaded.";
    //     }
    //     die;
    //     // Use spatie/pdf-to-image package to convert PDF page to image
    //     $pdf = new Pdf($pdfPath);
    //     $pdf->setPage(1) // Extract the first page
    //         ->setOutputFormat('jpg') // Set output format to JPEG
    //         ->saveImage($thumbnailPath); // Save the image to the thumbnail path

    //     $lib->update(['thumbnail' => $thumbnailPath]);
    // }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
    {
        // dd($library);
        $library->delete();
        // Optionally, you can add a redirect or response here
        return redirect()->route('library.index')->with('success', 'PDF deleted successfully.');
    }
}
