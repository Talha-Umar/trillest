$(document).ready(function(){

// get value of id and values when action is edit and data-role=edit for updating data
$(document).on('click','a[data-role=edit]',function(){
	var id=$(this).data('id');
	var cid=$('#'+id).children('td[data-target=cid]').text();
	var cname=$('#'+id).children('td[data-target=cname]').text();
	var name=$('#'+id).children('td[data-target=name]').text();
	var price=$('#'+id).children('td[data-target=price]').text();
	var description=$('#'+id).children('td[data-target=description]').text();
	$('#category').val(cid);
	$('#category').text(cname);
	$('#name').val(name);
	$('#price').val(price);
	$('#description').val(description);
	$('#Uid').val(id);
});
// get value of id when action is delete and data-role=delete for delete data
$(document).on('click','a[data-role=delete]',function(){
	var id=$(this).data('id');
	$('#Did').val(id);
});

	});