@extends('layout')
@section('content')
<div class="row justify-content-center">
    <h2 class="row justify-content-center">{{$corpus ? "Список комнат корпуса: ".$corpus->corpus_name : "Неверный ID категории"}}</h2>
    @if($corpus)
    <div class="col-4">
        <table class="table table-bordered">
        <thead>
            <tr>
                <td>id</td>
                <td>Имя корпуса</td>
                <td>Номер комнаты</td>
                <td>Количество кроватей</td>
                <td>Цена</td>
            </tr>
        </thead>
        @foreach($corpus->rooms as $room)
            <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->corpus_id}}</td>
                <td><a href="{{url('room/'.$room->id)}}">{{$room->room_number}}</a></td>
                <td>{{$room->bed_number}}</td>
                <td>{{$room->price}}</td>
            </tr>
        @endforeach
        </table>
    </div>
    @endif
    <div class="row justify-content-center ">
        <div class="col-4">
            <button class="btn btn-primary"><a style="color: white" href="{{url('corpuses')}}">Назад</a></button>
        </div>
    </div>
</div>
@endsection
