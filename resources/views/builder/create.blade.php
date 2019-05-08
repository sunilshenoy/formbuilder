@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/home">Dynamic Forms</a> : Create
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="/create">
                    @csrf
                        <div class="form-group">
                            <label for="form-structure">Form Name</label>
                            <input type="text" rows="22" name="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="form-structure">Enter form structure in JSON</label>
                            <small id="emailHelp" class="form-text text-muted">For type, please choose between "text", "textarea" and "file".</small>
                            <textarea rows="22" name="form_structure" class="form-control">{
"fields": [
        {
            "label": "Name",
            "name": "your_name",
            "type": "text"
        },
        {
            "label": "About you",
            "name": "about_you",
            "type": "textarea"
        },
        {
            "label": "Your Picture",
            "name": "picture",
            "type": "file"
        }
    ]
}
                            </textarea>
                            <small id="emailHelp" class="form-text text-muted">Please avoid using the same "name" again.</small>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Create Form">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
