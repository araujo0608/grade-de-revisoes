<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Agendar</title>
</head>
<body>
    
    <!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form action="{{route('review.schedule.store')}}" method="post">
              @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendamento</h5>
                <p>Hoje: {{date('d-m-Y')}}</p>
                <a href="{{route('review.show')}}">
                    <button type="button" class="close">
                        <span aria-hidden="true">&#9754;</span>
                    </button>
                </a>
                </div>
                <div class="modal-body">

                    @if($errors->all())
                        @foreach ($errors->all() as $error)
                            @if($error == 'on')
                                <div style="color: blue">Cadastrado com sucesso!</div>
                            @else
                                <div style="color: red">Ocorreu algum erro! Tente novamente!</div>
                            @endif
                        @endforeach
                    @endif
                  
                    <div>
                        <p>
                            Materia:
                            <select name="materia" id="materia" class="form-control" required>
                                @foreach ($materias as $materia)
                                    <option value="{{$materia->id}}">{{$materia->nome}}</option>    
                                @endforeach
                            </select>
                        </p>
                    </div>

                    <p>
                        Assunto:
                    </p>
                        <textarea name="assunto" id="assunto" cols="20" rows="2" class="form-control" placeholder="ex: figuras de linguagem" required></textarea>
                    <p>
                        Anotacoes:
                    </p>
                        <textarea name="anotacao" id="anotacao" cols="20" rows="4" class="form-control" placeholder="ex: revisar apenas conjugacao dos verbos" required></textarea>
                    
                    <p>
                        Data da revisao: <input type="date" name="datarevisao" id="datarevisao" class="form-control" required>
                    </p>
                    

                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Agendar!</button>
                <button type="reset" class="btn btn-outline-info">Limpar</button>
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

        //Script que define um limite para a data da revisao
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("datarevisao").setAttribute("min", today);
    </script>
</body>
</html>