@php use Illuminate\Support\Carbon; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2>{{$guest ? "Список бронирования гостя: ".$guest->last_name." ".$guest->first_name : "Ошибка"}}</h2>
@if($guest)
    <table border="1">
        <thead>
        <tr>
            <td>id</td>
            <td>Имя корпуса</td>
            <td>Номер комнаты</td>
            <td>Цена за одну ночь</td>
            <td>Дата заселения</td>
            <td>Дата выселения</td>
            <td>Количество дней проживания</td>
        </tr>
        </thead>
        @foreach($guest->rooms as $room)
            <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->corpus->corpus_name}}</td>
                <td>{{$room->room_number}}</td>
                <td>{{$room->price}}</td>
                <td>{{$room->pivot->check_in}}</td>
                <td>{{$room->pivot->check_out}}</td>
                <td>{{Carbon::parse($room->pivot->check_out)
                    ->diffInDays(Carbon::parse($room->pivot->check_in))}}</td>
            </tr>
        @endforeach
    </table>
    <h2>{{"Итого: ".$total}}</h2>
@endif
</body>
</html>


