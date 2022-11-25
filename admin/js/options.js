$(document).ready(function(){

// get value of id and values when action is edit and data-role=edit for updating data
$(document).on('click','a[data-role=edit]',function(){
	var id=$(this).data('id');
	var option=$('#'+id).children('td[data-target=option]').text();
	var price=$('#'+id).children('td[data-target=price]').text();
	$('#price').val(price);
	$('#option').val(option);

	$('#Uid').val(id);
});
// get value of id when action is delete and data-role=delete for delete data
$(document).on('click','a[data-role=delete]',function(){
	var id=$(this).data('id');
	$('#Did').val(id);
});

	});