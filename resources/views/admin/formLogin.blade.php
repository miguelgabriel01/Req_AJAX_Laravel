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
    

<form method="post" action="{{ route('admin.login.do') }}">
    @csrf

    @if($errors->all())
       @foreach ($errors->all() as $error)
       <div class="alert alert-danger" role="alert">
       {{$error}}
      </div>
       @endforeach
    @endif
        <div class="form-group">
          <label for="exampleInputEmail1">Endereço de Email</label>
          <input type="email" class="form-control" name="email" id="email" value="gabrielogabriel10@gmail.com" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
      
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>

    
</body>
</html>