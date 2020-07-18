<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Lista das revisoes completadas</title>
</head>
<body>
    
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form action="{{route('disciplines.store')}}" method="post">
              @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Revisoes Completadas</h5>
                <a href="{{route('review.show')}}">
                    <button type="button" class="close">
                        <span aria-hidden="true">&#9754;</span>
                    </button>
                </a>
                </div>
                    <div class="modal-body">
                        
                        <table class="table table-sm table-hover table-dark text-center">
                            <tr>
                                <th>Materia</th>
                                <th>Assunto</th>
                                <th>Data da revisao</th>
                                <th>Revisado em</th>
                            </tr>

                            @foreach ($revisoes as $revisao)
                                <tr>
                                    <td>{{$revisao->materia}}</td>
                                    <td>{{$revisao->assunto}}</td>
                                    <td>{{date('d-m-Y', strtotime($revisao->revisao))}}</td>
                                    <td>{{date('d-m-Y', strtotime($revisao->conclusao))}}</td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                <div class="modal-footer">
                <a href="{{route('review.show')}}"><button type="button" class="btn btn-outline-danger">&#9166; voltar</button></a>
                </div>
            </form>
      </div>
    </div>
  </div>

    {{--Script do bootstrap--}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        //Script que faz o popup aparecer quando a pagina carregar
        $(document).ready(function () {
            $('#formModal').modal('show');
        });
    </script>

</body>
</html>