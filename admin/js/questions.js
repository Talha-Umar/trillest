$(document).ready(function(){

// get value of id and values when action is edit and data-role=edit for updating data
$(document).on('click','a[data-role=edit]',function(){
	var id=$(this).data('id');
	var cid=$('#'+id).children('td[data-target=cid]').text();
	var cname=$('#'+id).children('td[data-target=cname]').text();
	var question=$('#'+id).children('td[data-target=question]').text();
	$('#category').val(cid);
	$('#category').text(cname);
	$('#question').val(question);

	$('#Uid').val(id);
});
// get value of id when action is delete and data-role=delete for delete data
$(document).on('click','a[data-role=delete]',function(){
	var id=$(this).data('id');
	$('#Did').val(id);
});

	});