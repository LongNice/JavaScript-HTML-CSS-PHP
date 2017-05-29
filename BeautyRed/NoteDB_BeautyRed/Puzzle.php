<?php			

$people_id = $_GET['ID']-1;
$R_File = file('UploadInfo.txt');

//***判斷是否為同一個User***
session_start();
if(empty($_SESSION['UserIdentify'])){ 
$_SESSION['UserIdentify'] = 1;

//***讀取ID資料***
$Img = preg_replace( "/\s/", "" , $R_File[$people_id*5+1]);
$WebSite = preg_replace( "/\s/", "" , $R_File[$people_id*5+4]);

}

?>

<html>	
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
<link rel="shortcut icon" type="image/x-icon" href="WebImg/WebIcon.jpg" />
<link rel="stylesheet" type="text/css" href="BRHome_stylesheet.css">
<title>BeautyRed - Puzzle</title>

<script type='text/javascript'>
	function Explanation(){
				alert("遊戲說明:\n 若想知道版面上表特們的相關資訊，請在50秒內完成拼圖遊戲任務\n\n 遊戲相關規則:\n1. 目前暫不開放自由上傳照片，若願意提供照片，請到FB粉絲頁發送相關訊息。\n2. 發送相關訊息如個人網頁、相片檔。\n3. 未經當事人同意，請勿盜圖或發送假相關訊息，以免觸法。\n更多相關詳細訊息請到BeautyRed粉絲頁。");
			}
			var $aaa = 1;
</script>
</head>		
		
		<body>	
		
		<!--網頁頂部元素佈局-->
		<div class="GTopElementsDiv">
		<div class = "GLogoImgDiv"><a href="BeautyRed.php"><img src="WebImg/WebName2.jpg"/></a></div>
		<div class="GEx_FB_Div">
		<ul>
		<li class="explanation" onclick="Explanation()">說明</li>
		<li class="FBfans"><a href="https://www.facebook.com/BeautyRed-674630072703276/" class="FBfans">FB粉絲團</a></li>
		</ul>
		</div>
		</div>	
		
		<!--***計時器***-->
		<center>
		<h1 id = "Timer">00:50</h1>
		</center>
		<!-- ***Canvas佈局配置***-->	
		<div align = "center">
		<div style="float:left; margin-right:-200px">
		<a href="http://longnice.clouds.twgogo.org/BeautyRed.php"><img src = "../WebImg/Return.jpg" /></a>
		</div>
		<canvas id="0" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="1" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="2" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="3" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas>
		
		<!--分享鈕-->
		<div style="float:right; margin-left:-200px">
		<div style="float:right;margin-left:10px;">
		<a target = "_blank" href="http://www.facebook.com/share.php?u=http://longnice.clouds.twgogo.org/Game.php?ID=<?php echo $$people_id;?>"><img src = "WebImg/fb-share-icon.png" /></a>
		</div>
		<div style="float:right;margin-left:10px;">
		<a target = "_blank" href="http://www.twitter.com/home/?status=longnice.clouds.twgogo.org/Game.php?ID=<?php echo $$people_id;?>"><img src = "WebImg/twitter-share-icon .png" /></a>
		</div>
		</div>
		</div>	
		
		<div align = "center">
		<canvas id="4" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="5" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="6" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="7" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas>
		</div>	
		<div align = "center">
		<canvas id="8" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="9" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="10" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="11" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas>
		</div>
		<div align = "center">
		<canvas id="12" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="13" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="14" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas><canvas id="15" width="135" height="135" style="border:2px solid #000000;" onclick="CanvasOnClick(this.id)">
		</canvas>
		</div>	
		
		
		<script type="text/javascript">	
		//****Timer倒數****
		var WinInterval = window.setInterval(function(){ 
		var text = document.getElementById('Timer').innerHTML;
		text = parseInt(text.substr(3))-1;
		if(text>=10){
		text = text.toString();
		document.getElementById('Timer').innerHTML = "00:"+text;
		}else{
		text = text.toString();
		document.getElementById('Timer').innerHTML = "00:0"+text;
		}
		}, 1000);
		
		//***Timer Time's up***
		window.setTimeout(function(){
		window.clearInterval(WinInterval);
		document.getElementById('Timer').innerHTML = "Time's Up!";			
		alert('不好意思~你挑戰失敗囉!');
		window.location.assign("http://longnice.clouds.twgogo.org/BeautyRed.php");
		}, 50000);
		
		//****用於Canvas圖片交換的變數****	
		var ClickNum = 0; 	
		var FirstSelectID;	
		var FirstCanvasData;	
		var FirstCanvasType;	
		var Firstpix = new Array();	
		var SecCanvasData;	
		var SecCanvasType;	
		var Secpix = new Array();		
		var Answer = new Array();

		//****用於Canvas佈局參數****	
		var CanvasDivSize = 135; //畫板區塊長、寬		
		
		//***圖片讀取完成事件***
		var image = new Image();
		image.src = "Bupload/<?php echo $Img;?>";

		image.onload = function(){	
		//****呈現圖片Resize****
		var CanvasHeightReducePix = 0;
		var CanvasWidthReducePix = 0;
		var CanvasHeightStretchPix = 0;
		var CanvasWidthStretchPix = 0;
		
		if(image.naturalHeight > CanvasDivSize*4){ //若圖片高大於CanvasSize
			CanvasHeightReducePix = image.naturalHeight/4-CanvasDivSize; //每個Canvas可以縮小的像素量
		}
		if(image.naturalWidth > CanvasDivSize*4){ //若圖片寬大於CanvasSize
			CanvasWidthReducePix = image.naturalWidth/4-CanvasDivSize;
		}
		if(CanvasDivSize <= (CanvasDivSize*4-image.naturalHeight)/2+20){ //若圖片高小於圖片到Canvas間距
			CanvasHeightStretchPix = CanvasDivSize-image.naturalHeight/4; //每個Canvas可以延伸的像素量
		}
		if(CanvasDivSize <= (CanvasDivSize*4-image.naturalWidth)/2+20){ //若圖片寬過小於圖片到Canvas間距
			CanvasWidthStretchPix = CanvasDivSize-image.naturalWidth/4;
		}
		
		//***陣列記錄圖畫順序***
		var SelectIDRecord = new Array(); //記錄所挑選過的CanvasID	
		
		//****繪製拼圖版面(亂序)****		
		for(var DrawingStep = 0; DrawingStep < 16; DrawingStep++){
			
		//****圖片繪製順序從左到右，從上到下，隨機挑選Canvas呈現****		
		var RandomSelectID = Math.floor(Math.random()*16); //隨機挑選CanvasID		
		while(typeof SelectIDRecord[RandomSelectID]!='undefined'){ //挑選過不能再挑選	
		RandomSelectID = Math.floor(Math.random()*16);	
		}	
		
		SelectIDRecord[RandomSelectID] = RandomSelectID;		
		var canvas = document.getElementById(''+RandomSelectID);	
		var paintType = canvas.getContext("2d"); //宣告繪圖類型，當前唯一個合法值是"2d"	
		//var SpacingWidth = (CanvasDivSize*4-image.naturalWidth)/2-CanvasDivSize*(DrawingStep%4); //在整體畫板上繪製的起始寬度，被減數為全Canvas邊長		
		//var SpacingHeight = (CanvasDivSize*4-image.naturalHeight)/2-CanvasDivSize*Math.floor(DrawingStep/4); //在整體畫板上繪製的起始高度	
		paintType.drawImage(image,
		0+(135-CanvasWidthStretchPix+CanvasWidthReducePix)*(DrawingStep%4),0+(135-CanvasHeightStretchPix+CanvasHeightReducePix)*Math.floor(DrawingStep/4),
		135-CanvasWidthStretchPix+CanvasWidthReducePix,135-CanvasHeightStretchPix+CanvasHeightReducePix,
		0,0,
		135,135); //drawImage(img,sx,sy,swidth,sheight,x,y,width,height): 
		                           //sx和sy:從圖片哪裡開始擷取，swidth和sheight截取圖片Size，x和y在Canvas哪裡畫起，width和height畫的大小(可縮放)
		Answer[RandomSelectID] = DrawingStep;	//記錄Canvas分別是繪製哪個圖片區塊用以排序萊檢查答案
		
		}		
		};
		
		//***Canvas點擊事件***
		function CanvasOnClick(ID){	
		ClickNum++;	
		if(ClickNum%2==1){	//第一次點選
		var FirstSelectCanvas = document.getElementById(ID);				
		FirstSelectCanvas.style.borderColor = "red";	//選擇的Canvas變成紅色	
		FirstCanvasType = FirstSelectCanvas.getContext("2d");		
		FirstCanvasData = FirstCanvasType.getImageData(0,0,CanvasDivSize,CanvasDivSize);		
		Firstpix = FirstCanvasData.data;		
		FirstSelectID = ID;	
		}	
		if(ClickNum%2==0){  //第二次點選
		var FirstSelectCanvas = document.getElementById(FirstSelectID); //用於將第一選取的Canvas邊框還原黑色	
		var SecSelectCanvas = document.getElementById(ID); //用於Canvas圖片對換		
		FirstSelectCanvas.style.borderColor = "black";		
		SecCanvasType = SecSelectCanvas.getContext("2d");		
		SecCanvasData = SecCanvasType.getImageData(0,0,CanvasDivSize,CanvasDivSize);		
		Secpix = SecCanvasData.data;		
		for(var RGBA = 0; RGBA<Secpix.length; RGBA+=3){			
		var Tempix = new Array(3); //暫存						
		
		//***來源到暫存***			
		Tempix[RGBA] = Firstpix[RGBA];			
		Tempix[RGBA+1] = Firstpix[RGBA+1];			
		Tempix[RGBA+2] = Firstpix[RGBA+2];	
		
		//***目標到來源***			
		Firstpix[RGBA] = Secpix[RGBA];			
		Firstpix[RGBA+1] = Secpix[RGBA+1];			
		Firstpix[RGBA+2] = Secpix[RGBA+2];
		
		//***暫存到目標***			
		Secpix[RGBA] = Tempix[RGBA];			
		Secpix[RGBA+1] = Tempix[RGBA+1];			
		Secpix[RGBA+2] = Tempix[RGBA+2];

		}		
		
		FirstCanvasType.putImageData(FirstCanvasData,0,0);		
		SecCanvasType.putImageData(SecCanvasData,0,0);
		
		//***答案排序***
		var TemAns = Answer[FirstSelectID];
		Answer[FirstSelectID] = Answer[ID];
		Answer[ID] = TemAns;
		CheckAnswer();
		}
		}	
		
		//****檢查答案事件****
		function CheckAnswer(){
			var Correct = 0;
			for(var ChecnkAnswer = 0; ChecnkAnswer<16; ChecnkAnswer++){
				if(Answer[ChecnkAnswer] == ChecnkAnswer){
				Correct++;
				}
			}
			if(Correct==16){
			window.clearInterval(WinInterval);
			alert("恭喜拼圖完成!!");
			window.open("<?php echo $WebSite;?>");
			window.open("http://longnice.clouds.twgogo.org/Bupload/<?php echo $Img;?>");
			window.location.assign("http://longnice.clouds.twgogo.org/Add.php?ID=<?php echo $people_id;?>");
			}
		}
			
		
		</script>
		</body>	
</html>