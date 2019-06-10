<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main style="margin: 20px;">
	<div>

		<div class="col s12 m4 l4">

			<div class="row">

				<div class="col s12 m6 l4">
					<div class="card red darken-1">
						<div class="card-content white-text">
							<span class="card-title">Agregar Contacto</span>
							<p>
								Agrege un contacto a su lista de amigos
							</p>
						</div>
						<div class="card-action">
							<a href="<?php echo base_url('index.php/create_contact') ?>">Ir</a>
						</div>
					</div>
				</div>

				<div class="col s12 m6 l4">
					<div class="card blue darken-1">
						<div class="card-content white-text">
							<span class="card-title">Ver Lista de Contactos</span>
							<p>
								Vea su lista de contactos
							</p>
						</div>
						<div class="card-action">
							<a href="<?php echo base_url('index.php/all_contacts') ?>">Ver</a>
						</div>
					</div>
				</div>

				<div class="col s12 m6 l4">
					<div class="card teal darken-1">
						<div class="card-content white-text">
							<span class="card-title">Buscar Contacto</span>
							<p>
								Busque sus contactos en su lista de amigos
							</p>
						</div>
						<div class="card-action">
							<a href="<?php echo base_url('index.php/search_contact') ?>">Buscar</a>
						</div>
					</div>
				</div>


			</div>

		</div>


	</div>
</main>
