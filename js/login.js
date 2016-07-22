$("#submit").click( function() {
		
	$.post( $("#register").attr("action"), 
	$("#register :input").serializeArray(),
	function(info) {
		
		$("#ack").empty();
		$("#ack").html(info);
		
		} );
		
		$("#register").submit( function() {
			return false;
 });
});