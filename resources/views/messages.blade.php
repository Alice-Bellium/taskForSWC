@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <div class="alert alert-default-danger col-md-6">
                <li>{{ $error }}</li>
            </div>
        @endforeach
    </ul>
@endif

@if(session('success'))
    <div class="alert alert-default-success">
        {{ session('success') }}
    </div>
@endif
