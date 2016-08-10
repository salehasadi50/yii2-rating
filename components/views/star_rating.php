

<?= kartik\rating\StarRating::widget(['name' => 'rating_' . $service_id . '_' . $item_id,'pluginOptions' =>['showClear'=>false], 'pluginEvents' =>["rating.change" => "send_favorite_" . $service_id . "_". $item_id]]);?>
<script type="text/javascript">
	var send_favorite_<?=$service_id ?>_<?= $item_id ?> = function(event, value, caption) {
		  $('.rate') .click (function(){

		    	$.ajax({
		             url : '<?= Yii::getAlias('@web')?>/rating/default/ajax',
		             type :'POST',
		             data :{
		                   	'service_id': <?= $service_id ?> ,
		                 	'item_id': <?= $item_id ?>,
			          'value': value,
		             },
		             success:function(data){
		             	console.log(data);
		             }
		           });
	         });
	}
	</script>