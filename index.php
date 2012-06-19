<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Крестики нолики</title>
<link rel="stylesheet" href="style.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/driver.js"></script>
</head>
<body>
<div id="fusname">
	<div style="float:left">
		<label>Ваш соперник: </label><label id="sopernik"></label>
	</div>
	<label id="me">Введите ваш ник: </label><input type="text" id="us_name" value=""/><input type="button" value="ok" id="okey"/>
</div>
<div class="container">
	<div class="pole">
		<img class="wline" src="images/crossedLines4.gif"/>
		<div>
			<input type="text" readonly="readonly" onfocus="this.blur()" name="klet" id="0" value=""/>
			<input type="text" readonly="readonly" onfocus="this.blur()" id="1" name="klet" value=""/>
			<input type="text" readonly="readonly" onfocus="this.blur()" id="2" value="" name="klet"/>
		</div>
		<div>
			<input type="text" readonly="readonly" onfocus="this.blur()" id="3" name="klet" value=""/>
			<input name="klet" readonly="readonly" onfocus="this.blur()" id="4" type="text" value=""/>
			<input name="klet" readonly="readonly" onfocus="this.blur()" type="text" id="5" value=""/>
		</div>
		<div>
			<input type="text" readonly="readonly" onfocus="this.blur()" id="6" name="klet" value=""/>
			<input id="7" readonly="readonly" type="text" onfocus="this.blur()" name="klet" value=""/>
			<input type="text" readonly="readonly" id="8" onfocus="this.blur()" name="klet" value=""/>
		</div>
	</div>
</div>
<div class="test">
	<input type="button" disabled="disabled" id="newgame" value="Поиск"/>
	<p class="winmsg">
	</p>
</div>
</body>
</html>
