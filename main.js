$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 153) {
    $('#header-fixed').fadeIn();
  } else {
    $('#header-fixed').fadeOut();
  }
});
$(document).ready(function(){
	$('.select-jadwal').change(function() {
	  var kota = $('#kota').val();
	  var bulan = $('#bulan').val();
	  $.ajax({
		    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
		    url         : 'process.php', // the url where we want to POST
		    data        : {kota:kota,bulan:bulan}, // our data object
		    dataType    : 'html', // what type of data do we expect back from the server
		    success : function(response){
			      $('#load-content').html(response);
			      alert('Sukses mengubah');
			}
		});
	});
});