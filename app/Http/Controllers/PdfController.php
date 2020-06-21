<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdfRequest;
use App\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        $pdfs = Pdf::first()->paginate(20);
        return view('index', compact('pdfs'));
    }

    public function store(PdfRequest $request, Pdf $pdf)
    {
        $fileName = time() . '.' . $request->file->extension();
        $img = time() . '.jpeg';
        $req = $request->file->move(public_path('storage/documents/'), $fileName);


        $image = new \Spatie\PdfToImage\Pdf($req);
        $image->saveImage(public_path('storage/images/' . time()));

        $pdf->create([
            'pdf_file' => $fileName,
            'pdf_image' => $img

        ])->save();

        return redirect(route('index'))->with('status', 'PDF file uploaded successfully');

    }

}
