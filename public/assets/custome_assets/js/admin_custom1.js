$(function(){
  $(".get.data").change(function(){
  	id = $(this).val();
  	table = $(this).data('table');
  	target = $(this).data('target');
  	url = $(this).data('url');
  	token = $(this).data('token');
  	filtered_by = $(this).data('filtered_by');

    $.ajax({
        url : url;
        type : "POST";
        data : {"id":id,"token":token,"filtered_by":filtered_by,"table":table};
        success : function(result){
        	rs = JSON.parse(result);
        	opt = '<option value="">select</option>';
        	$("#"+target).html(opt);
        	$.each(rs, function(index,obj){
                 opt = '<option value="'+obj.id+'">'+obj.name+'</option>';
                 ("#"+target).append(opt);
        	});


        }
    });

});

})