// JavaScript Document
 $(function(){
 
 
 var user = "";
 var enemy = "";
 var valhod = 1; // разраешение ход
 var myX = "000000000"; 
   
  // поиск игрока-соперника
  $('#poisk').click(function(){
    $.ajax({
	 url: "run.php",
	 type: "POST",
	 data: { funct: "poisk", us_name: user },
	 success: function(data) { if (data!=0) { 
	        $('#poisk').attr("disabled",true);
			 $('#enemy').attr("value",data);
			 $('#sopernik').text(data);
			 $('#newgame').attr("disabled",false);
          }	   
	   }
	});
  });
 
  // поддтверждаем имя
  $('#okey').click(function(){
     user = $('#us_name').val();
	  $.ajax({
	   url: "run.php",
	   type: "POST",
	   data: { funct: "user", us_name: user },
	   success: function(data) { 
	      if (data==1) { 
		    $('#okey').hide();
			$('#us_name').css("background-color","white");
			$('#us_name').css("border-style","none");
			$('#us_name').attr("disabled",true);
			$('label#me').text('Имя '); 
			$('#poisk').attr("disabled",false);
			$('title').text('Крестики-нолики '+user+'');
			$('input[name=klet]').attr("value","");
		  } 
		}
	  });
   });
   

String.prototype.replaceAt=function(index, char) {
      return this.substr(0, index) + char + this.substr(index+char.length);
   }

var schetchik = 0;
  
  // ставим крестик
    $(':input[name=klet]').click(function(){
	   if (($(this).attr("value")=="") && (valhod==1)) {
	  var krest = $(this).attr("id");

	   $.ajax({
	     url: "run.php",
		 type: "POST",
		 data: { funct: "krest", krest: krest, enemy: $('#enemy').attr("value") },
	   });
	   
	   $(this).attr("value",'X');

	    valhod = 0; // запрет хода
		
		myX = myX.replaceAt(parseInt(krest),"1");
		pobeda(myX,"me");
		 
		 if (schetchik ==9) { $('.winmsg').text("НИЧЬЯ!!!"); }
 	   }
	   
	});
	


// put zero to the table
var risuj = function(s) { 
   for (var i = 0; i<=8; i++) {
     if (s[i]==1) { 
	    $('input[id='+i+']').attr("value","O");
		valhod = 1;	  
	  }
    }
 }	

// получаем результат
function getres() { 
   	 $.ajax({
	  url: "run.php",
	  type: "POST",
	  data: { funct: "display", us_name: user },
	  success: function(data) { 
	   risuj(data); 
	    pobeda(data,"he");
		} 
	 });
  }

  var startIntID;
  
//  Запускаем таймер
function goGame(){
   startIntID = setInterval(function(){ getres(); },1500);
  }
// Останавливаем таймер
 function stopGame() {
   clearInterval(startIntID);
  }


 // новая игра	
 $('#newgame').click(function(){
   $(this).attr("value","новая игра"); 
   goGame();
   $.ajax({
   url: "run.php",
   type: "POST",
   data: { funct: "newgame", us_name: user, enemy: $('#enemy').attr("value") },
   success: function(data) { if (data==1) { 
		$('input[name=klet]').attr("value","");
		$('.wline').hide();
		$(':input[name=klet]').attr("disabled",false);
		myX = "000000000";
		valhod = 1;
		$('.winmsg').text("");
      } 
     }
   });
   
 });
 
 
 

	
	
 });