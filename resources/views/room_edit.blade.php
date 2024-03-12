<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
<h2>Редактирование данных о комнате</h2>
<form method="post" action="{{url('room/update/'.$room->id)}}">
    @csrf
    <label>Корпус</label>
    <select name="corpus_id" value="{{$room->corpus_id}}" >
        <option style="display: none" />
        @foreach($corpuses as $corpus)
            <option value="{{$corpus->id}}"
                    @if($room->corpus_id == $corpus->id) selected
                @endif>
                {{$corpus->corpus_name}}
            </option>
        @endforeach
    </select>
    @error('corpus_id')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Номер комнаты</label>
    <input type="text" name="room_number" value="{{$room->room_number }}" >
    @error('room_number')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Количество кроватей</label>
    <input type="number" name="bed_number" value="{{$room->bed_number}}" >
    @error('bed_number')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Цена</label>
    <input type="number" name="price" value="{{$room->price}}" >
    @error('price')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <input type="submit">
</form>
</body>
</html>

