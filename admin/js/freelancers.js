$(document).ready(function(){

// get value of id and values when action is edit and data-role=edit for updating data
$(document).on('click','a[data-role=edit]',function(){
	var id=$(this).data('id');
	var cid=$('#'+id).children('td[data-target=cid]').text();
	var cname=$('#'+id).children('td[data-target=cname]').text();
	var ctid=$('#'+id).children('td[data-target=ctid]').text();
	var ctname=$('#'+id).children('td[data-target=ctname]').text();
	var name=$('#'+id).children('td[data-target=name]').text();
	var email=$('#'+id).children('td[data-target=email]').text();
	var password=$('#'+id).children('td[data-target=password]').text();
	$('#category').val(cid);
	$('#category').text(cname);
	$('#city').val(ctid);
	$('#city').text(ctname);
	$('#name').val(name);
	$('#email').val(email);
	$('#password').val(password);

	$('#Uid').val(id);
});
// get value of id when action is delete and data-role=delete for delete data
$(document).on('click','a[data-role=delete]',function(){
	var id=$(this).data('id');
	$('#Did').val(id);
});

	});