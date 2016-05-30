$('.editButton').on('click', function(){
	event.preventDefault();

	//var postBody = event.target.parentNode.childNodes
	$("#edit-modal").modal();
});

$('.saveButton').on('click', function(){
	$("#save-modal").modal();
});

$('#modal-save-refeicao').on('click', function(){
	$('#acompanhamento').val();
	$('#prato-principal').val();
	$('#complemento').val();
	$('#salada').val();
	$('#sobremesa').val();
	$('#dia').val() //como é?
	$.ajax({
		method: 'POST',
		url: url,
		data: {
			'acompanhamento': $('#acompanhamento').val();
			'prato-principal': $('#prato-principal').val();
			'complemento': $('#complemento').val();
			'salada': $('#salada').val();
			'sobremesa': $('#sobremesa').val();
			'dia': $('#dia').val() //como é?
			}
		})
		.done(function(msg){
			console.log(msg['message']);
		});
});

