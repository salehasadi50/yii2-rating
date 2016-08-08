
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