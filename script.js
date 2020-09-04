$(document).ready(function(e) {
   $.ajaxSetup({cache:false});
   setInterval(function() {$('#chatBox').load('chat.php');}, 1000);
});