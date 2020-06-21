@extends('layout')

@section('index')

    <form action="/" method="post" enctype="multipart/form-data" class="m-2">
        @csrf
        <label for="file"></label>
        <input type="file" name="file" id="file">
        <button type="submit" class="btn btn-outline-primary">Upload PDF</button>
    </form>

    <br/>
    <x-alert/>

    <div class="container">

        <div class="row">
            @foreach($pdfs as $pdf)
                <div class="col-3">
                    <a href="" data-toggle="modal" data-target="#pdfModal-{{$pdf->id}}"><img src="{{'storage/images/'.$pdf->pdf_image}}" alt=""
                                                                               style="width: 100%"></a>
                    <div class="modal" tabindex="-1" role="dialog" id="pdfModal-{{$pdf->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{$pdf->pdf_file}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{'storage/images/'.$pdf->pdf_image}}" alt=""
                                         style="width: 100%">
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center">
            {{$pdfs->links()}}
        </div>

    </div>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>

@endsection
