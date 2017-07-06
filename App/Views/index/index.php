<div class="jumbotron">
    <h1> Eventos </h1>   
</div>

<div class="row">
	<?php foreach($this->view->events as $event): ?>

		<div class="col-md-12 event-item">
			<h3> <?= $event->title ?> </h3>

			<a class="btn btn-default btn-block btn-details"> Ver detalhes </a>

			<div class="item-details">
				<div class="row">
					<div class="col-md-4 col-xs-12">

						<?php 

							if($event->image == ""){
								$image = "/assets/images/sem-imagem.png";
							}else{
								$image = "/assets/images/uploads/".$event->image;
							}

						?>

						<div class="event-image" style="background-image: url('<?= $image ?>')">
						</div>
					</div> <!-- .col-md-4 -->

					<div class="col-md-8 col-xs-12">
						<p> <?= $event->description ?> </p>
					</div> <!-- .col-md-8 .col-mxs-12 -->
				</div> <!-- .row -->

				<div class="row">
					<div class="col-md-12"> <p> <b> Endereço: </b> <?= $event->address ?> </p> </div>
					<div class="col-md-12"> <p> <b> Data: </b> <?= date('d/m/Y', strtotime($event->starts_at)) ?> </p> </div>
				</div> <!-- .row -->
			</div> <!-- .item-details -->
		</div>

	<?php endforeach; ?>

</div> <!-- .row -->