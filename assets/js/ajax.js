/**
*-------------------------------------------------------
* AJAX Handling
*-------------------------------------------------------
*/

$(document).ready(function(){
	$('#contactTable').DataTable();
});

var saveMethod;
var table;

function addContact(){
	saveMethod="add";
	$('#formContact')[0].reset();
	$('#modalFormContact').modal('show');
}

