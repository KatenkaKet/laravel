@extends('layout')
@section('content')
<div class="row justify-content-center">
    <h2 class="row justify-content-center"> Список корпусов</h2>
    <div class="col-4">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>id</td>
                <td>Наименование</td>
            </tr>
            </thead>
            @foreach($corpuses as $corpus)
            <tr>
                <td>{{$corpus->id}}</td>
                <td><a href="{{url('corpus/'.$corpus->id)}}">{{$corpus->corpus_name}}</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
