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
	
	//***遊戲結束出線的按鈕事件***
	function NextStep(){
		var FinScore = document.getElementById("Timer").innerHTML;
		FinScore = parseInt(FinScore.substr(3));
		if(FinScore>=50000){
			window.open("<?php echo $WebSite;?>");
			window.open("http://longnice.clouds.twgogo.org/Bupload/<?php echo $Img;?>");
		}
		if(FinScore>=30000 && FinScore<50000){
			window.open("http://longnice.clouds.twgogo.org/Bupload/<?php echo $Img;?>");
		}
		window.location.assign("http://longnice.clouds.twgogo.org/Add.php?ID=<?php echo $people_id;?>");
	}
	
	alert(" 正妹邱比特:\n 聽著音樂的節奏(大鼓、小鼓、少部分的鈸)，點擊出線的圖片碎片，點擊越接近Tempo分數越高喔!\n\n 獎賞:\n 超過30000分可以得到表特的照片，超過50000可以得到表特的FB喔!");
	
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
		<h1 id = "Timer">前奏中</h1>
		</center>
		
		<!-- ***Canvas佈局配置***-->	
		<div align = "center">
		<div style="float:left; margin-right:-200px">
		<a href="http://longnice.clouds.twgogo.org/BeautyRed.php"><img src = "../WebImg/Return.jpg" /></a>
		</div>
		<canvas id="0" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="1" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="2" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="3" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas>
		
		<!--分享鈕-->
		<div style="float:right; margin-left:-200px">
		<div style="float:right;margin-left:10px;">
		<a target = "_blank" href="http://www.facebook.com/share.php?u=http://longnice.clouds.twgogo.org/Game3.php?ID=<?php echo $$people_id;?>"><img src = "WebImg/fb-share-icon.png" /></a>
		</div>
		<div style="float:right;margin-left:10px;">
		<a target = "_blank" href="http://www.twitter.com/home/?status=longnice.clouds.twgogo.org/Game3.php?ID=<?php echo $$people_id;?>"><img src = "WebImg/twitter-share-icon .png" /></a>
		</div>
		</div>
		</div>	
		
		<!--遊戲結束出線的按鈕-->
		<div style="float:left; margin-right:-200px">
		<input type="button" style="display:none; font-size:32px; margin-top:40px; margin-left:60px;" value="下一步" id="button1" onclick="NextStep()">
		</div>
		
		<div align = "center">
		<canvas id="4" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="5" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="6" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="7" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas>
		</div>	
		<div align = "center">
		<canvas id="8" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="9" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="10" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="11" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas>
		</div>
		<div align = "center">
		<canvas id="12" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="13" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="14" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas><canvas id="15" width="135" height="135" style="border:2px solid #000000;opacity:0.0;">
		</canvas>
		</div>	
		
		<!--***音樂***-->
		<audio autoplay/ id="mus">
			<source src="Music/grapes_I_dunno.mp3" type="audio/mpeg"/>
		
		<script type="text/javascript">	
		
		//******************Song Time's up***********************
		window.setTimeout(function(){
		window.clearInterval(WinInterval);
		document.getElementById("button1").style.display="block";
		var FinScore = document.getElementById("Timer").innerHTML;
		FinScore = parseInt(FinScore.substr(3));
		if(FinScore>=50000){
			alert("恭喜得到表特FB與照片，請點擊左方下一步按鈕");
		}
		if(FinScore>=30000 && FinScore<50000){
			alert("恭喜得到表特照片，請點擊左方下一步按鈕");
		}
		if(FinScore<30000){
			alert("挑戰失敗!什麼都沒贏得...請點擊左方下一步按鈕");
		}
		}, 79000);		
		//*******************************************************
		
		//****用於Canvas佈局參數****	
		var CanvasDivSize = 135; //畫板區塊長、寬	
		var Score = 0; //用於分數
		
		//************************************圖片讀取完成事件****************************************
		var image = new Image();
		image.src = "Bupload/<?php echo $Img;?>";
		
		//用於Resize的變數
		var CanvasHeightReducePix = 0;
		var CanvasWidthReducePix = 0;
		var CanvasHeightStretchPix = 0;
		var CanvasWidthStretchPix = 0;
		
		image.onload = function(){
			
		//****顯示圖片需要的Resize計算****
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
				
		};
		//**********************************************************************************************
		
		//************************************歌譜寫作區*************************************
		//****歌曲Tempo CanvasID，每個Canvas的顯示時間都在相對應位置的TempoTiming的陣列中**** 
		var TempoCanvasID = [0,2,5,7,10,11,8,12,13,14,15,
							 11,9,6,4,3,2,0,7,6,5,4,
							 8,10,12,14,15,11,9,0,1,2,3,
							 7,5,10,8,4,0,2,15,14,13,12,
							 9,11,6,0,1,5,7,10,12,14,
							 11,9,6,1,0,7,5,10,14,12,
							 9,11,6,0,1,5,7,10,12,14,
							 11,9,6,1,0,7,5,10,14,12,
							 0,2,5,7,10,11,8,12,13,14,15,
							 11,9,6,4,3,2,0,7,6,5,4,
							 8,10,12,14,15,11,9,0,1,2,3,
							 7,5,10,8,4,0,2,15,14,13,12];
		
		//****歌曲Tempo Timing(單位0.1秒)****
		//正拍sec-1.62
		var TempoTiming = [9.23,9.83,10.88,11.24,11.49,11.69,12.61,13.28,13.48,13.68,13.98, 
						   14.42,15.17,16.21,16.53,16.89,17.09,17.85,18.55,18.75,18.95,19.25,
						   19.90,20.51,21.58,21.85,22.19,22.39,23.27,23.92,24.12,24.32,24.62,
						   25.22,25.83,26.89,27.16,27.5,27.7,28.58,29.23,29.43,29.63,29.93,
						   30.52,31.16,31.92,32.21,32.6,33.24,33.92,34.63,34.89,35.23,
						   35.88,36.51,37.2,37.54,37.87,38.5,39.18,39.89,40.15,40.49,
						   41.22,41.88,42.52,42.93,43.22,43.88,44.53,45.22,45.48,45.82,
						   46.55,47.21,47.85,48.24,48.55,49.21,49.86,50.56,50.82,51.16,
						   51.84,52.44,53.49,53.85,54.10,54.30,55.22,55.89,56.09,56.29,56.59,
						   57.03,57.78,58.82,59.14,59.50,59.70,60.46,61.16,61.36,61.56,61.86,
						   62.51,63.12,64.19,64.46,64.80,65.00,65.88,66.53,66.73,66.93,67.23,
						   67.83,68.44,69.50,69.77,70.11,70.31,71.19,71.84,72.04,72.24,72.60];
		//***********************************************************************************
		
		
		//************************************Song Tempo*************************************
		var TempoStep=0; //用於判斷第幾個Tempo
		var CVStart=0; //用於判斷Canvas持續增加應從第幾個開始判斷就好，以免造成For Loop持續增加，此數取決快慢歌
		var GameRun; //遊戲進行時間壘加，用於判斷Canvas在當下是否該顯示，單位0.1秒
		var musSec = document.getElementById("mus");
		
		var WinInterval = window.setInterval(function(){ 
		GameRun = musSec.currentTime;
		GameRun = GameRun.toFixed(3);
		
		//***音樂載入中文顯***
		if(GameRun==0){
			document.getElementById('Timer').innerHTML = "音樂載入中";
		}
		if(GameRun<7){
			document.getElementById('Timer').innerHTML = "前奏中";
		}
		
		//***前奏文顯***
		if(GameRun>=7 && GameRun<10){
			document.getElementById('Timer').innerHTML = "準備倒數"+(10-Math.ceil(GameRun))+"秒";
		}
		if(10-Math.ceil(GameRun)==0){
			document.getElementById('Timer').innerHTML = "分數:0";
		}
		
		//**先前需持續增加Opacity的Canvas判斷
		if(TempoStep>0){
			if(TempoStep>=6){ //Tempo打到第X個開始，就不從頭開始判斷是否持續增加Opacity，另外也不會讓要重啟Canvas被隱藏掉
				CVStart = TempoStep-6;
			}
		for(var preCV = CVStart ; preCV < TempoStep ; preCV++){
			var Canvas = document.getElementById(TempoCanvasID[preCV]);
			if(TempoTiming[preCV] >= GameRun - 1.85){ //判斷顯示未達1秒的Canvas
				Canvas.style.opacity = parseFloat(Canvas.style.opacity)+0.002;
			}else{
				Canvas.style.opacity = 0; //Canvas顯示達到1.8秒的消失
			}
		}
		}
		
		//**當下Canvas該顯示的Opacity+0.07;**
		if(GameRun>=TempoTiming[TempoStep]){
		var Canvas = document.getElementById(TempoCanvasID[TempoStep]);	
		//該顯示的Canvas這個時候才開始得到圖片區塊
		//每次點擊Canvas會把該Canvas的圖片去除，來顯示文字(perfectg、great、good、miss)
		//因此該Canvas若要在重新被驅動顯示，則圖片的繪製必須在此一起處理
		var paintType = Canvas.getContext("2d");
		paintType.drawImage(image,
		0+(135-CanvasWidthStretchPix+CanvasWidthReducePix)*(TempoCanvasID[TempoStep]%4),0+(135-CanvasHeightStretchPix+CanvasHeightReducePix)*Math.floor(TempoCanvasID[TempoStep]/4),
		135-CanvasWidthStretchPix+CanvasWidthReducePix,135-CanvasHeightStretchPix+CanvasHeightReducePix,
		0,0,
		135,135); //drawImage(img,sx,sy,swidth,sheight,x,y,width,height): 
		                           //sx和sy:從圖片哪裡開始擷取，swidth和sheight截取圖片Size，x和y在Canvas哪裡畫起，width和height畫的大小(可縮放)
								   
		Canvas.style.opacity = parseFloat(Canvas.style.opacity)+0.002;
		Canvas.onclick = function(){CanvasOnClick(this.id)}; //給予Canvas點擊事件功能
		TempoStep++;
		}		
		if(TempoStep==(TempoCanvasID.length)){
			TempoStep++; //到最後一個Tempo時，需把TempoStep+1，用以此Timer處理持續增加最後一個顯示Canvas的Opacity
		}	
		
		}, 1);
		
		//**************************************************************************************
		
		//**********************************Canvas點擊事件**************************************
		function CanvasOnClick(ID){	
		var SelectCanvas = document.getElementById(ID);
		if(parseFloat(SelectCanvas.style.opacity)>0){		
		var CanvasType = SelectCanvas.getContext("2d");		
		CanvasData = CanvasType.getImageData(0,0,CanvasDivSize,CanvasDivSize);		
		pix = CanvasData.data;
		
		//***將Canvas圖片去除***
		var RGBIntegral = 0; //用於點擊判斷此Canvas是否已經全白
		for(var RGB = 0 ; RGB < pix.length ; RGB+=3){
			pix[RGB] = 255;
			pix[RGB+1] = 255;
			pix[RGB+2] = 255;
			RGBIntegral += (pix[RGB] + pix[RGB+1] + pix[RGB+2]) / 3;
		}
		CanvasType.putImageData(CanvasData,0,0);			
		
		//***判定點擊時機及分數***
		CanvasType.font = "30px Arial";
		if(parseFloat(SelectCanvas.style.opacity)<=0.2){
		CanvasType.fillText("Miss",20,70);
		}
		if(parseFloat(SelectCanvas.style.opacity)>0.2 && parseFloat(SelectCanvas.style.opacity)<=0.4){
		CanvasType.fillText("Good",20,70);
		Score+=200;
		}
		if(parseFloat(SelectCanvas.style.opacity)>0.4 && parseFloat(SelectCanvas.style.opacity)<=0.7){
		CanvasType.fillText("Great",20,70);
		Score+=350;
		}
		if(parseFloat(SelectCanvas.style.opacity)>0.7){
		CanvasType.fillText("Perfect",20,70);
		Score+=500;
		}
		
		document.getElementById('Timer').innerHTML = "分數:"+Score;
		
		SelectCanvas.style.opacity = 1.0;
		SelectCanvas.onclick = function(){RemoveCanvasOnClick()}; //取消掉該Canvas的點擊功能
		
		//文字動畫特效(Opavity遞減)
		var TextAnimination = window.setInterval(function(){
			SelectCanvas.style.opacity = parseFloat(SelectCanvas.style.opacity)-0.34;	
		},100)
		window.setTimeout(function(){
		window.clearInterval(TextAnimination);
		}, 300);	
		}
		}
		
		function RemoveCanvasOnClick(){
			// Do Nothing
			return false;
		}
		//**************************************************************************************	
		
		</script>
		</body>	
</html>