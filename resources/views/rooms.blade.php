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
        <td>id</td>
        <td>Имя корпуса</td>
        <td>Номер комнаты</td>
        <td>Количество кроватей</td>
        <td>Цена</td>
        <td>Название корпуса</td>
        </thead>
        @foreach($rooms as $room)
            <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->corpus_id}}</td>
                <td>{{$room->room_number}}</td>
                <td>{{$room->bed_number}}</td>
                <td>{{$room->price}}</td>
                <td>{{$room->corpus->corpus_name}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
