@php use Illuminate\Support\Carbon; @endphp
@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <h2 class="row justify-content-center">
            {{$guest ? "Список бронирования гостя: ".$guest->last_name." ".$guest->first_name : "Ошибка"}}
        </h2>
        @if ($guest)
            <div class="col-10">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Имя корпуса</th>
                        <th>Номер комнаты</th>
                        <th>Цена за одну ночь</th>
                        <th>Дата заселения</th>
                        <th>Дата выселения</th>
                        <th>Количество дней проживания</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($guest->rooms as $room)
                        <tr>
                            <td>{{$room->id}}</td>
                            <td>{{$room->corpus->corpus_name}}</td>
                            <td>{{$room->room_number}}</td>
                            <td>{{$room->price}}</td>
                            <td>{{$room->pivot->check_in}}</td>
                            <td>{{$room->pivot->check_out}}</td>
                            <td>{{Carbon::parse($room->pivot->check_out)->diffInDays(Carbon::parse($room->pivot->check_in))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <h2>{{"Итого: ".$total}}</h2>
            </div>
        @endif
    </div>

@endsection


