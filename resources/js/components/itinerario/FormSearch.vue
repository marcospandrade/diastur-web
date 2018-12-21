<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div id="form-busca">
						<form class="form-horizontal" id="buscaForm" target="_blank">
							<div class="row">
								<div class="col-xs-9">
									<div class="form-group">
										<div class="col-sm-12">
											<input type="text" name="buscaOrigem" id="buscaOrigem" class="form-control form-campo ui-autocomplete-input" placeholder="Origem" onkeyup="this.value=retira_acentos(this.value);" minlength="4" required="" autocomplete="off">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<input type="text" name="buscaDestino" id="buscaDestino" class="form-control form-campo ui-autocomplete-input" placeholder="Destino" onkeyup="this.value=retira_acentos(this.value);" minlength="4" required="" autocomplete="off">
										</div>
									</div>							
								</div>
								<div class="col-xs-3">
									<div class="form-group">
										<div class="col-sm-12 text-center" style="padding-top:50px;">
											<button type="submit" class="btn btn-success">Pesquisar</button>
										</div>								
									</div>
								</div>
							</div>							
						</form>	
					</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {



        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
