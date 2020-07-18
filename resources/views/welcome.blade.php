<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Grade de revisoes</title>
</head>
<body class="container">

    <header class="text-center">
        <h1 class="">Grade</h1>
        <h5>site para agendamento de revisao de materia escolar</h5>
        <hr>
    </header>

    <div class="container text-center">
        <a href="{{route('review.schedule')}}"><button class="btn btn-warning btn-sm float-left" id="novarevisao">Nova Revisao &#9998;</button></a>
        <a href="{{route('review.schedule.completed')}}"><button class="btn btn-warning btn-sm" id="historico">Revisoes concluidas &#9778;</button></a>
        <a href="{{route('disciplines')}}"><button class="btn btn-warning btn-sm float-right" id="disciplina">Add disciplina &#10000;</button></a>
    </div>
    
    <br>
    <br>
    @if (count($revisoes) <= 0)
        <div class="container text-center">
            <h1 style="color: rgb(167, 0, 0)">&#8598; Agende uma revisao!</h1>
        </div>
        <script>
            document.getElementById('novarevisao').style.backgroundColor = "red";
            document.getElementById('novarevisao').innerHTML = "<strong>CLIQUE AQUI!</strong>";
            document.getElementById('novarevisao').style.color = "white";
        </script>
    @else
    <table class="table table-sm table-hover table-dark text-center">
        <tr>
            <th>Materia</th>
            <th>Assunto</th>
            <th>Anotacoes</th>
            <th>Data da revisao</th>
            <th>Revisado em</th>
            <th>Status</th>
            <th>Concluir revisao</th>
        </tr>

        @foreach ($revisoes as $revisao)
            <tr>
                <td>{{$revisao->materia}}</td>
                <td>{{$revisao->assunto}}</td>
                <td>{{$revisao->anotacoes}}</td>
                <td>{{date('d-m-Y', strtotime($revisao->revisao))}}</td>
                <td>{{date('d-m-Y', strtotime($revisao->conclusao))}}</td>
                <td>{{$revisao->status}}</td>
                <td>
                    <form action="{{route('review.complete')}}" method="post">
                        @csrf
                        <input type="hidden" name="idmateria" value="{{$revisao->idmateria}}">
                        <input type="hidden" name="assunto" value="{{$revisao->assunto}}">
                        <input type="hidden" name="revisao" value="{{$revisao->revisao}}">
                        <button type="submit" class="btn btn-success btn-sm">concluir &#10003;</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @endif


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>