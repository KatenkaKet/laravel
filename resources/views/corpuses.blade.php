<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2> Список корпусов</h2>
<table border="1">
    <thead>
    <td>id</td>
    <td>Наименование</td>
    </thead>
    @foreach($corpuses as $corpus_model)
    <tr>
        <td>{{$corpus_model->id}}</td>
        <td>{{$corpus_model->corpus_name}}</td>
    </tr>
    @endforeach
</table>
</body>
</html>
