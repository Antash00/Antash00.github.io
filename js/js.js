$(document).ready(function(){
	var name;
	$('#datepicker').on('keydown', function(e)
		{
		if($(this).val().length>9&&e.keyCode != 8)
		{
	return false;
		}
		});
	$('.sum').on('keydown', function(e)
	{
  		if(e.key.length == 1 && e.key.match(/[^0-9'".]/))
		{
    return false;
  		}
	});
$('.sum').on('change', function(e){
	if ($(this).val() <1000)
	{
		$(this).val("1000");
	}
	else if ($(this).val() > 3000000)
	{
			$(this).val("3000000");
	}
	name =$(this).attr("name");
	$("."+name+"").val($(this).val());
});
$('input[type=range]').on('change', function()
{
	$("input[name='"+$(this).attr('class')+"']").val($(this).val());
});
$('.calculator').on('submit', function(e){

	event.preventDefault(); 
	var $that = $(this),
    formData = new FormData($that.get(0));
		$.ajax({
			url:"calc.php",
			type: 'POST',
			contentType: false,
      processData: false,
			data: formData,
			success: function(answer)
				{
					$(".answer").html(answer);
				}

			});


});
});
