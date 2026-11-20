<?php

?>

<html>
    <head>
    </head>

    	<body>
		<table>
			<tr style="height:50px">
				<td colspan="2">
					<h1>ÁREA DE CADASTRO</h1>
				</td>
			</tr>
			<tr style="height:50px">
				<td colspan="2">
					Registre-se
				</td>
			</tr>
			<tr style="height:400px">
				<td colspan="2">
					<!-- TABELA QUE MOSTRA O MENU DO USUARIO -->
					<table style="height:400px;">
						<tr>
							<td style="vertical-align:top; text-align:left;">
								<form method="post" action="frmCadastro_processa.php" enctype="multipart/form-data">
									<table>
										<tr>
											<td colspan="2">
												<b>:: Novo Usu&aacute;rio ::</b>
											</td>
										</tr>
										<tr> 
											<td>
												Nome:											
											</td>
											<td>
												<input type="text" size="70" name="txtNome"/>
											</td>
										</tr>
										<tr> 
											<td>
												Login:											
											</td>
											<td>
												<input type="text" size="30" name="txtLogin"/>
											</td>
										</tr>
										<tr> 
											<td>
												Senha:											
											</td>
											<td>
												<input type="text" size="30" name="txtSenha"/>
											</td>
										</tr>

										<tr> 
											<td>
												Foto:											
											</td>
											<td>
												<input type="file" size="30" name="txtArquivo"/>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="right">
												<button type="reset" name="btnApagar">Apagar</button>
												<button type="submit" name="btnSalvar">Salvar</button>
											</td>
										</tr>
									</table>
								</form>
							</td>
						</tr>
					</table>					
				</td>
			</tr>
		</table>
	</body>

</html>