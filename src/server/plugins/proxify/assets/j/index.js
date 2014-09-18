	$(function() {
		$('#proxify').submit(function(e) {
			var url = Base64.encode($("[name='url']").val());
			
			//$("[name='url']").val(Base64.encode(url));
			
			window.location += url;
			
			return false;
		});
	});