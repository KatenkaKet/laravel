@extends('layout')
@section('content')
<div class="row justify-content-center">
    <h2 class="row justify-content-center">{{$room ? "Название корпуса: ".$room->corpus->corpus_name.", Номер комнаты: ".$room->room_number : "Ошибка"}}</h2>
    @if($room)
    <div class="col-4">
        <table class="table table-bordered">
        <thead>
        <tr>
            <td>ФИО</td>
            <td>Дата заселения</td>
            <td>Дата выселения</td>
            <td>Количество дней проживания</td>
        </tr>
        </thead>
        @foreach($room->guest as $guest)
            <tr>
                <td>{{$guest->last_name." ".$guest->first_name." ".$guest->patronymic}}</td>
                <td>{{$guest->pivot->check_in}}</td>
                <td>{{$guest->pivot->check_out}}</td>
                <td>{{Carbon::parse($guest->pivot->check_out)
                    ->diffInDays(Carbon::parse($guest->pivot->check_in))}}</td>
            </tr>
        @endforeach
        </table>
    </div>
   @endif
    <div class="row justify-content-center ">
        <div class="col-4">
            <button class="btn btn-primary"><a style="color: white" href="{{url('corpus/'.$room->corpus_id)}}">Назад</a></button>
        </div>
    </div>
</div>
@endsection
