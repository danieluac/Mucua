$(document).ready(function(){
    $('.datatable').DataTable({
    	responsive: true,
    	language: {
    		"sProcessing":   "A processar...",
		    "sLengthMenu":   "_MENU_ Nº de registos",
		    "sZeroRecords":  "Não foram encontrados resultados",
		    "sInfo":         "Mostrado de _START_ até _END_ de _TOTAL_ registos",
		    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
		    "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
		    "sInfoPostFix":  "",
		    "sSearch":       "Procurar registos:",
		    "sUrl":          "",
		    "oPaginate": {
		        "sFirst":    "Primeiro",
		        "sPrevious": "Anterior",
		        "sNext":     "Seguinte",
		        "sLast":     "Último"
		    }
		},
		processing: true
		
	});
});