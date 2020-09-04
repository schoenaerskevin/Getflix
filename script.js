function submitchat(){
   if(form1.msg.value == ''){ //exit if one of the field is blank
      alert('Enter your message please !');
      return;
   }
   let msg = form1.msg.value;
   let xmlhttp = new XMLHttpRequest(); //http request instance
   
   xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
      if(xmlhttp.readyState==4&&xmlhttp.status==200){
         document.getElementById('chatBox').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
      }
   }
   xmlhttp.open('POST', 'chatbox.php', true); //open and send http request
   xmlhttp.send();
}
$(document).ready(function(e) {
      $.ajaxSetup({cache:false});
      setInterval(function() {$('#chatBox').load('chatbox.php');
   //console.log("refresh");
}, 1000);
   });