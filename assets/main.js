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