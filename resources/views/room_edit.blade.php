@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <h2 class="row justify-content-center">Редактирование данных о комнате</h2>
        <div class="col-4">
        <form method="post" action="{{url('room/update/'.$room->id)}}">
            @csrf

            <div class="mb-3">
                <label>Корпус</label>
                <select name="corpus_id" class="form-control">
                    <option style="display: none"></option>
                    @foreach($corpuses as $corpus)
                        <option value="{{$corpus->id}}" @if($room->corpus_id == $corpus->id) selected @endif>
                            {{$corpus->corpus_name}}
                        </option>
                    @endforeach
                </select>
                @error('corpus_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Номер комнаты</label>
                <input type="text" name="room_number" class="form-control" value="{{$room->room_number}}">
                @error('room_number')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Количество кроватей</label>
                <input type="number" name="bed_number" class="form-control" value="{{$room->bed_number}}">
                @error('bed_number')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Цена</label>
                <input type="number" name="price" class="form-control" value="{{$room->price}}">
                @error('price')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
        </div>
    </div>
@endsection

