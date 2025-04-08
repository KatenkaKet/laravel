@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <h2 class="row justify-content-center">Список корпусов</h2>
        <div class="col-8"> <!-- расширено, чтобы влезали картинки -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Наименование</td>
                    <td>Изображение</td> <!-- новая колонка -->
                </tr>
                </thead>
                <tbody>
                @foreach($corpuses as $corpus)
                    <tr>
                        <td>{{$corpus->id}}</td>
                        <td><a href="{{ url('corpus/'.$corpus->id) }}">{{$corpus->corpus_name}}</a></td>
                        <td>
                            @if($corpus->image_url)
                                <img src="{{ $corpus->image_url }}" alt="Corpus Image" style="max-width: 100px; max-height: 100px;">
                            @else
                                Нет изображения
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
