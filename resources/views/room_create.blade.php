@extends('layout')
@section('content')
<div class="row justify-content-center">
    <h2 class="row justify-content-center">Добавление комнаты</h2>
    <div class="col-4">
        <form method="post" action="{{url('room')}}">
            @csrf
            <div class="mb-3">
                <label for="corpus" class="form-label">Корпус</label>
                <select class="form-select" id="corpus" aria-describedby="corpusHelp" name="corpus_id" value="{{old('corpus_id')}}" >
                    <option style="display: none" />
                    @foreach($corpuses as $corpus)
                        <option value="{{$corpus->id}}"
                                @if(old('corpus_id') == $corpus->id) selected
                            @endif>
                            {{$corpus->corpus_name}}
                        </option>
                    @endforeach
                </select>
                <div id="corpusHelp" class="form-text">Выберите корпус</div>
                @error('corpus_id')
                <div class="is-invalid">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="room_number" class="form-label" >Номер комнаты</label>
                <input type="text" class="form-control @error('room_number') is-valid @enderror"
                       id="room_number" name="room_number" aria-describedby="room_numberHelp" value="{{ old('room_number') }}" >
                <div id="room_numberHelp" class="form-text">Введите номер комнаты</div>
                @error('room_number')
                <div class="is-invalid">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bed_number" class="form-label" >Количество кроватей</label>
                <input type="number" class="form-control @error('bed_number') is-invalid @enderror"
                       id="bed_number" name="bed_number" aria-describedby="bed_numberHelp" value="{{old('bed_number')}}" >
                <div id="bed_numberHelp" class="form-text">Укажите количество кроватей в комнате</div>
                @error('bed_number')
                <div class="is-invalid">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label" >Цена</label>
                <input type="number" class="form-control @error('pricr') is-invalid @enderror"
                       id="price" aria-describedby="priceHelp" name="price" value="{{old('price')}}" >
                <div id="priceHelp" class="form-text">Введите цену комнаты</div>
                @error('price')
                <div class="is-invalid">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection
