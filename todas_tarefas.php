<?php 
	$acao = 'recuperar';
	require_once 'tarefa_controller.php';
?>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>

<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="img/logo.png" width="30" height="30">
				App Lista Tarefas
			</a>
		</div>
	</nav>

	<div class="container app">
		<div class="row">
			<div class="col-sm-3 menu">
				<ul class="list-group">
					<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
					<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
					<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="col-sm-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Todas tarefas</h4>
							<hr />

							<?php foreach($todas_tarefas as $indice => $Tarefa) { ?>
								<div class="row mb-3 d-flex align-items-center tarefa">
									
									<div class="col-sm-9" id="tarefa_<?= (int)$Tarefa->id ?>">
										<?= htmlspecialchars($Tarefa->tarefa) ?> 
										(<?= htmlspecialchars($Tarefa->status) ?>)
									</div>

									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger"></i>

										<i class="fas fa-edit fa-lg text-info btn-editar"
										   data-id="<?= (int)$Tarefa->id ?>"
										   data-tarefa="<?= htmlspecialchars($Tarefa->tarefa, ENT_QUOTES) ?>">
										</i>

										<i class="fas fa-check-square fa-lg text-success"></i>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
	document.addEventListener("click", function(e) {

		if (e.target.classList.contains("btn-editar")) {

			let id = e.target.getAttribute("data-id");
			let txt_tarefa = e.target.getAttribute("data-tarefa");

			let form = document.createElement('form');
			form.action = 'tarefa_controller.php?acao=atualizar';
			form.method = 'post';
			form.className = 'row';

			let inputTarefa = document.createElement('input');
			inputTarefa.type = 'text';
			inputTarefa.name = 'tarefa';
			inputTarefa.className = 'col-9 form-control';
			inputTarefa.value = txt_tarefa;

			let inputID = document.createElement('input');
			inputID.type = 'hidden';
			inputID.name = 'id';
			inputID.value = id;

			let button = document.createElement('button');
			button.type = 'submit';
			button.className = 'col-3 btn btn-info';
			button.innerHTML = 'Atualizar';

			form.appendChild(inputTarefa);
			form.appendChild(inputID);
			form.appendChild(button);

			let tarefaDiv = document.getElementById('tarefa_' + id);
			tarefaDiv.innerHTML = '';
			tarefaDiv.appendChild(form);
		}
	});
	</script>

</body>
</html>