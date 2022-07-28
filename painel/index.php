<?php
	include("../config/cotas.php");
	include("../config/painel.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Painel administrativo</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,600" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.selectric/1.10.1/selectric.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
<link rel="stylesheet" href="libs/css/style.css">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-none d-md-block sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link active" href="#">
							<i class="zmdi zmdi-widgets"></i>
							Dashboard <span class="sr-only">(current)</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">
			<div class="card-list">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card blue">
							<div class="title">Usuários registrados</div>
							<i class="zmdi zmdi-upload"></i>
							<div class="value"><?php echo count($importaUsuarios); ?></div>
							<div class="stat"></div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card green">
							<div class="title">Vendas realizadas</div>
							<i class="zmdi zmdi-upload"></i>
							<div class="value"><?php echo count($importaVendas); ?></div>
							<div class="stat"></div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card orange">
							<div class="title">Total de cotas vendidas</div>
							<i class="zmdi zmdi-download"></i>
							<div class="value"><?php echo count($sorteados); ?></div>
							<div class="stat"></div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card red">
							<div class="title">Cotas restantes</div>
							<i class="zmdi zmdi-download"></i>
							<div class="value"><?php echo ($cotaMaxima - count($sorteados)) ?></div>
							<div class="stat"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="projects mb-4">
				<div class="projects-inner">
					<header class="projects-header">
						<div class="title">Lista de usuários</div>
						<div class="count"></div>
						<i class="zmdi zmdi-download"></i>
					</header>
					<table class="projects-table text-center" id="myTable">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Email</th>
								<th>Telefone</th>
								<th>Ações</th>
							</tr>
						</thead>
						<?php
							foreach ($importaUsuarios as $value) {
								echo '
									<tr>
										<td>
											<p>'.$value['id'].'</p>
										</td>
										<td>
											<p>'.$value['nome'].'</p>
										</td>
										<td>
											<p>'.$value['email'].'</p>
										</td>
										<td>
											<p>'.$value['telefone'].'</p>
										</td>
										<td>
											<select class="action-box text-center qtdCotass">
												<option>2</option>
												<option>5</option>
												<option>10</option>
												<option>20</option>
											</select>
											<button class="btn btn-danger add-cotas" data-toggle="modal" data-target="#exampleModalCenter">Adicionar cotas</button>
											<input type="hidden" class="cotasA" value="">
										</td>
									</tr>
								';
							}
						?>
					</table>
				</div>
			</div>
			<div class="projects mb-4">
				<div class="projects-inner">
					<header class="projects-header">
						<div class="title">Lista de vendas</div>
						<div class="count"></div>
					</header>
					<table class="projects-table text-center" id="tabelaVendas">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome comprador</th>
								<th>Email comprador</th>
								<th>Valor</th>
								<th>Qtd. Cotas</th>
								<th>Cotas</th>
								<th>Status</th>
								<th>Ações</th>
							</tr>
						</thead>
						<?php
							foreach ($importaVendas as $value) {
								foreach ($importaUsuarios as $usuarios) {
									if ($value['idComprador'] == $usuarios['id']) {
										
										if ($value['status'] == 0) {
											$value['status'] = 'Pendente';
										} elseif ($value['status'] == 1) {
											$value['status'] = 'Aprovado';
										}

										echo '
										<tr>
											<td>
												<p>'.$value['id'].'</p>
											</td>
											<td>
												<p>'.$usuarios['nome'].'</p>
											</td>
											<td>
												<p>'.$usuarios['email'].'</p>
											</td>
											<td>
												<p>R$ '.number_format($value['valor'],2,",",".").'</p>
											</td>
											<td>
												<p>'.$value['qtdCotas'].'</p>
											</td>
											<td>
												<p>'.$value['cotas'].'</p>
											</td>
											<td>
												<p>'.$value['status'].'</p>
											</td>
											<td>
												<form class="form" action="#" method="POST">
													<button class="btn btn-sucess">Aprovar</button>
													<button class="btn btn-primary">Pendente</button>
												</form>
											</td>
										</tr>
									';
									}
								}
							}
						?>
					</table>
				</div>
			</div>
		</main>
	</div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='https://cdn.jsdelivr.net/jquery.selectric/1.10.1/jquery.selectric.min.js'></script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js'></script> -->
<script  src="libs/js/script.js"></script>
<script>
	$(document).ready( function () {
		$('#myTable').DataTable();
	});

	$(document).ready( function () {
		$('#tabelaVendas').DataTable();
	});
</script>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
