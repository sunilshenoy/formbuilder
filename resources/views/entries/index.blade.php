@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/home">Dynamic Forms</a> : {{$form[0]->name}}
                    <div style='float:right'><a href='/entries/{{$form[0]->id}}/new' class='btn btn-success'>New Entry</a></div>
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
                            <th scope="col">Entries</th>
                            <th scope="col" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entries as $entry)
                                <tr>
                                <td>{{$entry->data}}</td>
                                <td><a href="/entries/{{$form[0]->id}}/edit/{{$entry->id}}">Edit</a> |
                                <a data-method="delete" style="cursor:pointer;" onclick="$(this).find('form').submit();">Delete
                                    <form action="/entries/{{$form[0]->id}}/delete/{{$entry->id}}" method="POST" name="delete_item" style="display:none">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                    </a>
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
