<?php
    # Base de Dados
	include "script/database.php";

	$groupa = selectAllGroups();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>
	<div class="card text-center">
      <div class="card-body">
        <h1 class="card-title">Grupos</h1>

		<form class="bd-search d-flex align-items-center "  role="search" id="nav-search-form" method="post" action="">
                <div class="">
                    <div class="">
                            <button type="submit" class="btn btn-search pr-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Pesquisar Nome do Grupo" name ="search">
                    <span class="algolia-autocomplete">
                        <button type="submit" class="btn btn-search pr-1"></button>
                    </span>
                </div>
            </form>

		<div class="table-responsive-sm">
  			<table class="table table-bordered">
			<tr>
				<td><center><b>Código</b></center></td>
				<td><center><b>Nome do Grupo</b></center></td>
				<td><center><b>Descrição</b></center></td>
				<td><center><b>Administrdor</b></center></td>
				<td><center><b>Data de criação</b></center></td>
				<td><center><b>Modificar</b></center></td>
				<td><center><b>Deletar</b></center></td>
			</tr>
      	</div>
	
		<!--h1>Lista de Clientes</h1>
		<hr-->
		<?php while($dados = mysqli_fetch_assoc($groups)) { ?>
				<tr>
					<td><center><b><?php echo $dados['id']; ?></center></b></td>
					<td><center><?php echo $dados['nome']; ?></center></td>
					<td><center><?php echo $dados['descricao']; ?></center></td>
					<td><center><?php echo $dados['colecionador_administrador']; ?></center></td>
					<td><center><?php echo $dados['data_de_criacao']; ?></center></td>
					<td><center><a href="atualizar.php?id=<?php echo $dados['id'] ?>"><i class="fas fa-edit"></i> </a></center></td>
					<td><center><a class="text-danger"  href="del.php?id=<?php echo $dados['id'] ?>"><i class="fas fa-trash-alt"></i></a></center></td>	
				</tr>
				
			<?php } ?>
			</table>

		<a href="/<? $dados["id"]; ?>" class="btn btn-primary"></i>Voltar</a>

	</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>