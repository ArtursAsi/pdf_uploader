<div class="container">
    @if($errors->has('file') )
        <div class="alert alert-danger">
            {{ $errors->first('file') }}
        </div>
        @elseif (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
</div>
