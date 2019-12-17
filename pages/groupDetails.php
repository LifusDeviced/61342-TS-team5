<?php
	# Base de Dados
  include "../script/database.php";

  # Pega o id da url
	$id = $_GET["groupId"];

  # Busca um grupo de acordo com o id passado
  $group = selectGroup($id);
  
  # Busca os colecionadores do grupo
  $collectors = selectCollectorsByGroup($id);

  # Valor estático para id do colecionado usuário
  $userId = 8;

  # Variável para verificar se usuário faz parte do grupo
  $isMember = false;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <link rel="stylesheet" href="../styles/custom.css">
    <title><?php $group->Name ?></title>
  </head>
  <body>
  	<nav class="navbar navbar-dark bg-dark nav center color">
        <img class="img" src="https://upload.wikimedia.org/wikipedia/commons/d/d9/Pawn_Stars_logo-large.png" alt="Logo Colecionadores">
    </nav>
    <div class="groupPageContainer">
      <h1><?php echo $group->Name ?></h1>
      <p><?php echo $group->Description ?></p>
      <div class="table-responsive-sm">
  			<table class="table table-bordered">
        <tr>
          <td><center><b>Participantes</b></center></td>
        </tr>
        <?php forEach($collectors as &$collector) { ?>
          <?php
            if ($collector->Registration == $userId) {
              $isMember = true;
            }
          ?>
          <tr>
          <td><center><?php echo $collector->FullName ?></center></td>
          </tr>
        <?php } ?>
        </table>
      </div>
      <?php if ($isMember) { ?>
        <a class="btn btn-danger" href="./delete.php?groupId=<?php echo $group->Id ?>&collectorRegistration=<?php echo $userId ?>">Sair</a>
      <?php } else { ?>
        <a class="btn btn-success" href="./insert.php?groupId=<?php echo $group->Id ?>&collectorRegistration=<?php echo $userId ?>">Participar</a>
      <?php } ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>