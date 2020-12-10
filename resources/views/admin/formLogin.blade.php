<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Form Login</title>
</head>
<body>


<form name="formLogin">
    @csrf

       <div class="alert alert-danger d-none messageBox"  role="alert"></div>
       <!-- d-none: (Oculto por padrão) para que os alertas de erro não sejam exibidos quando a pag for carregada pela primeira vez sem a tentativa de login do usuario!
        
       messageBox: classe usada como seletor -->

        <div class="form-group">
          <label for="exampleInputEmail1">Endereço de Email</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" id="password" name="password" value="">
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
      <script>
          $(function(){
              $('form[name="formLogin"]').submit(function(event){
                  event.preventDefault();//previni a ação padrão do submite

                 $.ajax({
                     url: "{{ route('admin.login.do') }}",//rota que receberá os dados do formulario
                     type: "post",//o tipo de requisição(GET,POST)
                     data: $(this).serialize(),//o serialize organiza todos os dados em um array associativo
                     dataType: 'json',//o tipo de dados(array,json)
                     success: function(response){//função de resposta
                       if(response.success === true){
                           window.location.href = "{{ route('admin')}}";
                       }else{
                           $('.messageBox').removeClass('d-none').html(response.message);//exibe o alrte que por padrão esta com display none e exibe uma msg nele
                           //alert('Erro:: ' + response.message);
                       }
                       console.log(response);
                     }
                 });
                //method="post" action="{{ route('admin.login.do') }}"
              });
          });
      </script>
</body>
</html>
