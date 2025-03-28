<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
   <link rel="stylesheet" href="/css/form-edit.css">
   <link href="/css/bootstrap-5.3.2.min.css" rel="stylesheet">
   <link href="/css/bootstrap-4.0.0.min.css" rel="stylesheet">
   <title>Editar Produto</title>
</head>

<body>
   <form action="{{ route('produtos-update', ['id'=>$produtos->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <h2>Editar Produto</h2>
      <div class="form-group">
         <label for="nome">Nome do produto:</label>
         <input type="text" name="nome" id="nome" value="{{ $produtos->nome }}">
      </div>
      <div class="form-group">
         <label for="categoria">Categoria:</label>
         <select name="categoria" id="categoria" class="form-control" required>
            <option value="Alimentos" {{ $produtos->categoria == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
            <option value="Bebida" {{ $produtos->categoria == 'Bebida' ? 'selected' : '' }}>Bebida</option>
            <option value="Limpeza" {{ $produtos->categoria == 'Limpeza' ? 'selected' : '' }}>Limpeza</option>
            <option value="Higiene" {{ $produtos->categoria == 'Higiene' ? 'selected' : '' }}>Higiene</option>
         </select>
      </div>
      <div class="form-group">
         <label for="validade">Validade:</label>
         <input type="text" name="validade" id="validade" value="{{ $produtos->validade }}" maxlength="7">
      </div>
      <div class="form-group">
         <label for="valor">valor:</label>
         <input type="text" name="valor" id="valor" value="{{ number_format($produtos->valor, 2, ',', '.') }}">
      </div>
      <div class="modal-footer">
         <a href="{{ route('index') }}"><button type="submit" class="btn btn-secondary">Voltar</button></a>
         <button type="submit" class="btn btn-success">Atualizar</button>
      </div>
   </form>
</body>

</html>