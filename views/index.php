<style>
	.boxes{
		width:100%;
		height:200px;
		margin-bottom: 20px;
		-webkit-box-shadow: 0px 0px 5px -2px rgba(50, 50, 99, 0.82);
		-moz-box-shadow: 0px 0px 5px -2px rgba(50, 50, 99, 0.82);
		box-shadow: 0px 0px 5px -2px rgba(50, 50, 99, 0.82);

	}
	.image{
		width: 200px;
		height: 200px;
		float: right;
	}
	.title-des{
		width: 600px;
		height: auto;
		float: right;
		margin: 10px;
	}
	.image img{
		width: 200px;
	}
</style>
<?php foreach ($model as $models):?>
		<div class="boxes" >
		
			<div class="image"><img src="<?= Yii::getAlias('@web')?>/frontend/assets/images/<?=$models->image ?>.png" alt=""></div>

			<div class="title-des">
				<?= $models->title?>
				<br><br>
				<?= $models->description?>
				<br><br>
			</div>

		
				<?php /*echo kartik\rating\StarRating::widget(['name' => 'rating_35','value' => 3,'pluginOptions' => ['displayOnly' => true]]); */?>
				<?php echo kartik\rating\StarRating::widget(['name' => 'rating_35','value' => 3,'pluginOptions' => ['displayOnly' => true]]);?>



			  <span id="start" class="target"><!-- Hidden anchor to close all modals --></span>
			  <span id="about_<?= $models->id ?>" class="target"><!-- Hidden anchor to open adjesting modal container--></span>
			  <div class="modal">
			  	<div class="content vertical-align-middle">
			    
			        		<?php echo kartik\rating\StarRating::widget(['name' => 'rating_1_'. $models->id,'pluginOptions' => ['showClear'=>false], 'pluginEvents' => ["rating.change" => "send_favorite_1_" . $models->id]]);?>

			        		<p>Please rate this app</p>
			        		<a href="" class="rate" id="">ثبت نظر</a>
			        		<a class="close-btn" href="#start">X</a>
			   	</div>
			   </div>

			   <div class="page-container">

			   	<?php  if (Yii::$app->user->isGuest) {
				        echo '<p><a href="http://localhost/test-dev/user/login">ثبت نظر</a></p>';
				    } else { ?>
			   	<p><a href="#about_<?= $models->id ?>">نظر خود را ثبت کنید</a></p> <?php } ?>
			   </div>
			
		</div>
<?php endforeach; ?>


<?php foreach ($model as $models): ?>
	<script type="text/javascript">
	var send_favorite_1_<?= $models->id ?> = function(event, value, caption) {
		 $('.rate') .click (function(){

		    	$.ajax({
		             url : '<?= Yii::getAlias('@web')?>/rating/ajax',
		             type :'POST',
		             data :{
		                   	'service_id': <?= $models->category_id ?>,
		                 	'item_id': <?= $models->id ?>,
			          'value': value,
		             },
		             success:function(data){
		             	console.log(data);
		             }
		          });
	         });
	}
	</script>
<?php endforeach; ?>
<?php  ?>