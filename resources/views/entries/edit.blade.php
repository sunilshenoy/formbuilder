@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/home">Dynamic Forms</a> : {{$form[0]->name}} : Edit Entry
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
                    <form method="post" enctype="multipart/form-data" action="/entries/{{$form[0]->id}}/edit/{{$entry_id}}">
                    @method('PUT')
                    @csrf

                    @foreach($fields->fields as $field)
                        <div class="form-group">
                            <label for="form-structure">{{$field->label}}</label>
                            @if($field->type == "text")
                                <input value="@php echo $entry->{$field->name} @endphp" type="text" name="{{$field->name}}" class="form-control"/>
                            @elseif($field->type == "textarea")
                                <textarea rows="12" name="{{$field->name}}" class="form-control">@php echo $entry->{$field->name} @endphp</textarea>
                            @elseif($field->type == "file")
                                <input type="file" name="{{$field->name}}" class="form-control"/>
                            @endif
                        </div>
                    @endforeach

                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
