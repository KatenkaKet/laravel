@php use Illuminate\Support\Carbon; @endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2>{{$room ? "Название корпуса: ".$room->corpus->corpus_name.", Номер комнаты: ".$room->room_number : "Ошибка"}}</h2>
@if($room)
    <table border="1">
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
@endif
</body>
</html>
