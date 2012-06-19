/* new wave */
$(function(){


 // WICTORY
var pobeda = function(pob,who) {
var kind; win = false;
  
  if ((pob[0]==1)&&(pob[1]==1)&&(pob[2]==1)) { kind = 0; win = true; }
  if ((pob[3]==1)&&(pob[4]==1)&&(pob[5]==1)) { kind = 1; win = true; }
  if ((pob[6]==1)&&(pob[7]==1)&&(pob[8]==1)) { kind = 2; win = true; }
  
  if ((pob[0]==1)&&(pob[3]==1)&&(pob[6]==1)) { kind = 3; win = true; }
  if ((pob[1]==1)&&(pob[4]==1)&&(pob[7]==1)) { kind = 4; win = true; }
  if ((pob[2]==1)&&(pob[5]==1)&&(pob[8]==1)) { kind = 5; win = true; }
  
  if ((pob[0]==1)&&(pob[4]==1)&&(pob[8]==1)) { kind = 6; win = true; }
  if ((pob[2]==1)&&(pob[4]==1)&&(pob[6]==1)) { kind = 7; win = true; }
  
  if (win==true) {
    
	 if (who=="me") {
		 var directory  = "";
	  }
	  else var directory = "lose";
	     
    }
  
   switch (kind) {
     case 0: $('.wline').attr("src","images/"+directory+"/"+"crossedLines6.gif"); break; // 0 1 2
     case 1: $('.wline').attr("src","images/"+directory+"/"+"crossedLines5.gif"); break; // 3 4 5
     case 2: $('.wline').attr("src","images/"+directory+"/"+"crossedLines7.gif"); break; // 6 7 8
	 case 3: $('.wline').attr("src","images/"+directory+"/"+"crossedLines8.gif"); break; // 0 3 6
	 case 4: $('.wline').attr("src","images/"+directory+"/"+"crossedLines4.gif"); break; // 1 4 7
	 case 5: $('.wline').attr("src","images/"+directory+"/"+"crossedLines9.gif"); break; // 2 5 8
	 case 6: $('.wline').attr("src","images/"+directory+"/"+"crossedLines1.gif"); break; // 0 4 8
	 case 7: $('.wline').attr("src","images/"+directory+"/"+"crossedLines2.gif"); break; // 2 4 6
	}
	
	
  if (win==true) { 
     
	if (who=="me") { 
	                 $('.winmsg').text("VICTORY!!!");
	                 } 
					 else
					  {
	if (who=="he") {
		$('.winmsg').text("YOU LOSE!!!");
	   }
	 }
	 
    $('.wline').show();
	$(':input[name=klet]').attr("disabled","disabled");
	  
	  
	
   }
 }

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

 /* cookies */

// setting cookies
function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

// getting cookies
function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}

// checking cookies
function checkCookie()
{
	var username=getCookie("fname");
		
	if (username!=null && username!="")
	{
		
		$('#us_name').val(username);
		
		pst = getCookie("postid");
		
		if (pst!=null && pst!="")
		{
					
			$('#newgame').attr("disabled",false);
		
		}
		
	}
}









// CHECKING COOKIES
checkCookie();





















var timeId;
var	$name;

// searhing
function startSearch()
{
	
	clearInterval(timeId);
	
	timeId = setInterval(search,1000);

	i = '';
	
	function search() {		
		
		$.post("libs/controller.php",{ action: 'search' },function(data){
			
			
			if (data==0 || data==""){
				
				$('#sopernik').text("searching."+i);

				i+='.';
		
				if (i=='...') i = '';
				
			}
			else
			{
				
				clearInterval(timeId);
				$('#sopernik').text(data);
				$('#newgame').attr("disabled",true);
				
			}	
			
		});
		
	}
	
}


$('#newgame').click(function(){

	startSearch();

});


	// starting new user
	$('#okey').click(function(){
	
	
		if ($('#us_name').val()!=''){
	
			$name = $('#us_name').val();
			
			$.post('libs/controller.php',{ action: 'start', name: $name } , function(data) {
			
			
				if (data!=null && data!=""){
				
					setCookie('fname',$name,365);
					setCookie('postid',data);
					
					$('#newgame').attr("disabled",false);
				
				}
			
			});
		
		}
		
	});

});