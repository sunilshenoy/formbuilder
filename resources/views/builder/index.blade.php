@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dynamic Forms
                    <div style='float:right'><a href='/create' class='btn btn-success'>Create Form</a></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Form Name</th>
                            <th scope="col">Entries</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)
                                <tr>
                                <td>{{$form->name}}</td>
                                <td><a href="/entries/{{$form->id}}">Entries</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
