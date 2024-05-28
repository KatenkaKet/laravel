@extends('layout')
@section('content')
<div class="row justify-content-center" style="margin: 2rem">
    <h2 class="mt-3">Список комнат</h2>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>id корпуса</th>
                <th>Номер комнаты</th>
                <th>Количество кроватей</th>
                <th>Цена</th>
                <th>Название корпуса</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{$room->id}}</td>
                    <td>{{$room->corpus_id}}</td>
                    <td>{{$room->room_number}}</td>
                    <td>{{$room->bed_number}}</td>
                    <td>{{$room->price}}</td>
                    <td>{{$room->corpus->corpus_name}}</td>
                    <td>
                        <a href="{{url('room/destroy/'.$room->id)}}" class="btn btn-danger">Удалить</a>
                        <a href="{{url('room/edit/'.$room->id)}}" class="btn btn-primary">Редактирование</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{$rooms->links()}}
</div>
@endsection
