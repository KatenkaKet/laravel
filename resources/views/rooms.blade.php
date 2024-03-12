<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2>Список комнат</h2>
    <table border="1">
        <thead>
        <tr>
            <td>id</td>
            <td>id корпуса</td>
            <td>Номер комнаты</td>
            <td>Количество кроватей</td>
            <td>Цена</td>
            <td>Название корпуса</td>
            <td>Действие</td>
        </tr>
        </thead>
        @foreach($rooms as $room)
            <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->corpus_id}}</td>
                <td>{{$room->room_number}}</td>
                <td>{{$room->bed_number}}</td>
                <td>{{$room->price}}</td>
                <td>{{$room->corpus->corpus_name}}</td>
                <td><a href="{{url('room/destroy/'.$room->id)}}">Удалить</a>
                    <a href="{{url('room/edit/'.$room->id)}}">Редактирование</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
