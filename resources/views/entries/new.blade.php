@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/home">Dynamic Forms</a> : {{$form[0]->name}} : New Entry
                </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" enctype="multipart/form-data" action="/entries/{{$form[0]->id}}/new">
                    @csrf
                    @foreach($fields->fields as $field)
                        <div class="form-group">
                            <label for="form-structure">{{$field->label}}</label>
                            @if($field->type == "text")
                                <input type="text" name="{{$field->name}}_fb_t" class="form-control"/>
                            @elseif($field->type == "textarea")
                                <textarea rows="12" name="{{$field->name}}_fb_t" class="form-control"></textarea>
                            @elseif($field->type == "file")
                                <input type="file" name="{{$field->name}}_fb_f" class="form-control"/>
                            @endif
                        </div>
                    @endforeach
                    <input type="submit" class="btn btn-primary" value="Submit Form">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
