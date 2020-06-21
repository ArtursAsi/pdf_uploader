<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdfRequest;
use App\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function index()
    {
        $pdfs = DB::table('pdfs')->paginate(20);
        return view('index', compact('pdfs'));
    }

    public function store(PdfRequest $request, Pdf $pdf)
    {
        $fileName = time() . '.' . $request->file->extension();
        $img = time() . '.jpeg';
        $req = $request->file->move('storage/documents/', $fileName);


        $image = new \Spatie\PdfToImage\Pdf($req);
        $image->saveImage(public_path('storage/images/' . time()));

        $pdf->create([
            'pdf_file' => $fileName,
            'pdf_image' => $img

        ])->save();

        return redirect(route('index'))->with('status', 'PDF file uploaded successfully');

    }

    public function destroy(Pdf $pdf)
    {
        Storage::delete('documents/'.$pdf->pdf_file);
        Storage::delete('images/'.$pdf->pdf_image);
        $pdf->delete();


        return redirect()->back()->with('status', 'PDF file removed successfully');
    }

}
