<!DOCTYPE html>
<html>
	<head>
		<title>Convenia TESTE</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<style type="text/css">
			.main {
				margin-top: 20px;
			}
			.quem_vai, .ferias, .input-group {
				margin-bottom: 5px;
			}
			.amarelo {
				color: yellow;
			}
			.vermelho {
				color: red;
			}
			.azul {
				color: #069;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.quem_vai').click(function() {
	  				$.ajax({
		                type: "post",
		                dataType: "json",
		                url: "/convenia/grupo_escolhido",
		                success: function(data){
		                	var html = '';

	                        $.each(data, function(i, item){
								html += '<label class="sr-only" for="exampleInputAmount">Resultado</label>';
								html += '<div class="input-group">';
		                		html += '<div class="input-group-addon">Grupo: </div>';
								html += '<input type="text" class="form-control" id="resultado_grupo" value="' + item + '" disabled>';
								html += '</div><br>';
							});

		                	$('.grupos').html(html);
		                }
		            });
		            
		            return false;
				});

				$('.ferias').click(function() {
	  				$.ajax({
		                type: "post",
		                dataType: "json",
		                url: "/convenia/ferias",
		                data: {data_ferias: $('#data_ferias').val()},
		                success: function(data){
		                	alert(data);
		                }
		            });
		            
		            return false;
				});
			});
		</script>
	</head>
	<body>
		<div class="row">
			<div class="col-md-12 main">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<button class="btn btn-danger" type="button">
							  Mensagens enviadas <span class="badge"><?php echo $mensagens_count ?></span>
							</button>
						</div>
						<div class="panel-body">
							<ul class="list-group">
								<?php foreach ($mensagens as $indice => $mensagem) : ?>
									<li class="list-group-item"><?php echo $mensagem['mensagem'] ?></li>
								<?php endforeach ?>
							</ul>
						</div>
  						<div class="panel-footer">
  							<form action="/convenia/salvar_mensagem" method="post">
	  							<div class="input-group">
									<label for="comment">Comentario: </label>
									<textarea class="form-control" rows="5" id="comment" maxlength="100" name="mensagem"></textarea>
								</div>
								<button class="btn btn-success" type="submit">
								 	Enviar Mensagem
								</button>
							</form>
  						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="col-md-12">
						<div class="well">
							<h1>Parte 1</h1>
							<p>
							Sabe-se que por trás de cada cometa há um OVNI. Esses OVNIs frequentemente buscam bons desenvolvedores aqui na Terra. Infelizmente só têm espaço para levar um grupo de devs por vez. Para a seleção, há um engenhoso esquema, da associação do nome do cometa ao nome do grupo, que possibilita a cada grupo saber se será levado ou não.
							<br><br>
							Os dois nomes, do grupo e do cometa, são convertidos em um número que representa o produto das letras do nome, onde “A” é 1 e “Z” é 26. Assim, o grupo “LARANJA” seria 12 * 1* 18 * 1 * 14 * 10 * 1 = 30240. Se o resto da divisão do número do grupo por 45 for igual ao resto da divisão do número do cometa por 45, então o grupo será levado.</p>
						</div>
						<div class="col-md-8">
							<table class="table table-bordered">
								<thead>
									<th>Cometa</th>
									<th>Grupo</th>
								</thead>
								<tbody>
									<tr class="amarelo">
										<td>HALLEY</td>
										<td>AMARELO</td>
									</tr>
									<tr class="vermelho">
										<td>ENCKE</td>
										<td>VERMELHO</td>
									</tr>
									<tr class="preto">
										<td>WOLF</td>
										<td>PRETO</td>
									</tr>
									<tr class="azul">
										<td>KUSHIDA</td>
										<td>AZUL</td>
									</tr>
								</tbody>
							</table>	
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-danger quem_vai">Quem vai ?</button>
							<div class="form-group grupos">
								
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="well">
							<h1>Parte 2</h1>
							<p>
							Foram contratados 5 programadores em datas diferentes.
							<br><br>
							Precisamos organizar qual vai ser o período de férias destes funcionários de acordo a lei CLT. Não sabemos ao certo como funciona, mas já escutamos falar em algo sobre período aquisitivo e período concessivo. <strong>Com base na data de contratação dos programadores quais seriam esses períodos para cada um?</strong></p>
						</div>
						<div class="col-md-8">
							<select class="form-control" id="data_ferias">
								<option value="01/01/2014">Func 1 - 01/01/2014</option>
								<option value="11/07/2013">Func 2 - 11/07/2013</option>
								<option value="15/06/2014">Func 3 - 15/06/2014</option>
								<option value="21/07/2015">Func 4 - 21/07/2015</option>
								<option value="01/02/2015">Func 5 - 01/02/2015</option>
							</select>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-danger ferias">Calcular Férias?</button>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<br><br><br>
	</body>
</html>