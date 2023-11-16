
var hiddenProfile = $('#hiddenProfile').val();
var hiddenDepartm = $('#userdepartment').val();

$('.stockTable').DataTable({
	"ajax": "ajax/datatable-stocks.ajax.php?hiddenProfile="+hiddenProfile+"&hiddenDepartm="+hiddenDepartm, 
	"deferRender": true,
	"retrieve": true,
	"processing": true
});
