<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
    <h2>{{$corpus ? "Список ".$corpus->corpus_name : "Неверный ID категории"}}</h2>
    @if($corpus)
    <table border="1">
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
                <td>{{$room->room_number}}</td>
                <td>{{$room->bed_number}}</td>
                <td>{{$room->price}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>
