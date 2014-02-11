$(document).ready(function(){

	$.get('dashboard/xhrGetListings',function(e){

		for(var i = 0 ; i< e.length ; i++){
			$('#listInsert').append('<div>'+e[i].text+' <a class="del" rel="'+e[i].id+'"href="#"> X </a></div>');
		}
		
		$('.del').live('click',function(){

			delItem = $(this);

			var id = $(this).attr('rel');

			$.post('dashboard/xhrDeleteListing',{'id':id},function(o){
				delItem.parent().remove();
			},'json');

			return false;
		});
	},'json');

	

	//ajax post
	$('#randomInsert').submit(function(){
		var url = $(this).attr('action');
		var data = $(this).serialize();

		$.post(url,data,function(o){
			$('#listInsert').append('<div>'+ o.text +' <a class="del" rel="'+ o.id +'" href="#"> X </a> </div>');
		},'json');

		return false;
	});


});