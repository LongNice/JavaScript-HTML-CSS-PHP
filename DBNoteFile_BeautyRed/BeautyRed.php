<?php
//***清除掉玩家辨識碼(防刷)***
session_start();
if(isset($_SESSION['UserIdentify'])){
unset($_SESSION['UserIdentify']);
}

//***讀取初始資料***
$R_File = file('UploadInfo.txt');
$People_number = count($R_File)/5; //**** /5 = > 每個人有五筆資料 ****

for($scan = 0;$scan<$People_number;$scan++){
	$IDArray[$scan] = preg_replace( "/\s/", "" , $R_File[$scan*5]);
	$ImgArray[$scan] = preg_replace( "/\s/", "" , $R_File[$scan*5+1]);;
	$PopularityArray[$scan] = preg_replace( "/\s/", "" , $R_File[$scan*5+2]);;
	$DateArray[$scan] = preg_replace( "/\s/", "" , $R_File[$scan*5+3]);;
}


//***搜尋引擎***
if((isset($_POST['SearchPopularityLV']) && !empty($_POST['SearchPopularityLV'])) || (isset($_POST['SearchID']) && !empty($_POST['SearchID']))){
	$SearchPopularityLV = $_POST['SearchPopularityLV'];
	$SearchID = $_POST['SearchID']-1;
	$push = 0;
	
	//***清除初始顯示陣列***
	unset($IDArray);
	unset($ImgArray);
	unset($PopularityArray);
	unset($DateArray);
	$IDArray = array();
	$ImgArray = array();
	$PopularityArray = array();
	$DateArray = array();
		
	//***搜尋id***
		if($SearchID>=0){ //SearchID這欄使用者不輸入任何值會給予0
		$IDArray[0] = preg_replace( "/\s/", "" , $R_File[$SearchID*5]);
		$ImgArray[0] =  preg_replace( "/\s/", "" , $R_File[$SearchID*5+1]);
		$PopularityArray[0] =  preg_replace( "/\s/", "" , $R_File[$SearchID*5+2]);
		$DateArray[0] =  preg_replace( "/\s/", "" , $R_File[$SearchID*5+3]);
		}

	//***搜尋稱號***
		for($scan = 0;$scan<$People_number;$scan++){
			
		$SearchPopularity = preg_replace( "/\s/", "" , $R_File[$scan*5+2]); //***取得名聲值來判斷(去除換行指令)***
		
		if($SearchPopularityLV==1 && $SearchPopularity<50){
		$IDArray[$push] = preg_replace( "/\s/", "" , $R_File[$scan*5]);
		$ImgArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+1]);
		$PopularityArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+2]);
		$DateArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+3]);
		$push++;
		}else if($SearchPopularityLV==2 && ($SearchPopularity>=50 && $SearchPopularity<100)){
		$IDArray[$push] = preg_replace( "/\s/", "" , $R_File[$scan*5]);
		$ImgArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+1]);
		$PopularityArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+2]);
		$DateArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+3]);
		$push++;
		}else if($SearchPopularityLV==3 && ($SearchPopularity>=100 && $SearchPopularity<200)){
		$IDArray[$push] = preg_replace( "/\s/", "" , $R_File[$scan*5]);
		$ImgArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+1]);
		$PopularityArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+2]);
		$DateArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+3]);
		$push++;
		}else if($SearchPopularityLV==4 && ($SearchPopularity>=200 && $SearchPopularity<500)){
		$IDArray[$push] = preg_replace( "/\s/", "" , $R_File[$scan*5]);
		$ImgArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+1]);
		$PopularityArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+2]);
		$DateArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+3]);
		$push++;
		}else if($SearchPopularityLV==5 && $SearchPopularity>=500){
		$IDArray[$push] = preg_replace( "/\s/", "" , $R_File[$scan*5]);
		$ImgArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+1]);
		$PopularityArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+2]);
		$DateArray[$push] =  preg_replace( "/\s/", "" , $R_File[$scan*5+3]);
		$push++;
		}
		}
}

?>

<html>
	<head>
	<link rel="shortcut icon" type="image/x-icon" href="WebImg/WebIcon.jpg" />
	<title>BeautyRed</title>
	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--lazyload-->
		<script src="jquery-3.1.0.js"></script>
		<script src="jquery.lazyload.js"></script>
		<link rel="stylesheet" type="text/css" href="BRHome_stylesheet.css">
		
		<script type="text/javascript">
			
			//***遊戲說明****
			function Explanation(){
				alert("遊戲說明:\n 若想知道版面上表特們的相關資訊，請在50秒內完成拼圖遊戲任務\n\n 遊戲相關規則:\n 1. 目前暫不開放自由上傳照片，若願意提供照片，請到FB粉絲頁發送相關訊息。\n 2. 發送相關訊息如個人網頁、相片檔。\n 3. 未經當事人同意，請勿盜圖或發送假相關訊息，以免觸法。\n 更多相關詳細訊息請到BeautyRed粉絲頁。");
			}
			
			function DynamicPeopleTable(){
				var IDArray = ["<?php echo join("\",\"",$IDArray);?>"]; //PHP_IDArray轉JS_IDArray
				var ImgArray = ["<?php echo join("\",\"",$ImgArray);?>"]; 
				var PopularityArray = ["<?php echo join("\",\"",$PopularityArray);?>"]; 
				var DateArray = ["<?php echo join("\",\"",$DateArray);?>"]; 
				
				//***清除版面元素(搜尋時版面變化用途)***
				for(var clear = 0; clear < <?php echo $People_number;?>; clear++){
				var elements = document.getElementById(clear); //依據PeopleDiv.id
				if(elements!=null){
				elements[0].parentNode.removeChild(elements[0]);
				}else{
					break;
				}
				}

				//***表特個別區塊建置***
				for(var people = 0; people < <?php echo $People_number;?>; people++){
					if(ImgArray[people]!="" && ImgArray[people]!=null){
					//***取得圖片資料***
					var Img = new Image();
					var PeopleDiv_height;
						Img.src = 'Bupload/'+ImgArray[people];
						Img.setAttribute('data-original','Bupload/'+ImgArray[people]);
						Img.style.margin ="10 10 5 10";
						Img.style.borderRadius = "10px";
						Img.width = '220';
						//Img.id = people;
						$("Img").lazyload({
							threshlod : 200,
							effect : "fadeIn"
						});
						Img.onload = function(){
						this.height = 220*(this.naturalHeight/this.naturalWidth);
						PeopleDiv_height = 220*(this.naturalHeight/this.naturalWidth)+80;
						if(this.height>300){
							this.height = 300;
							PeopleDiv_height = 380;
						}
						};
					var PeopleDiv = document.createElement('div');
					//PeopleDiv.style.display="inline-block";
					PeopleDiv.style.width="240";
					PeopleDiv.style.height = PeopleDiv_height;
					PeopleDiv.style.paddingBottom = "10px";
					//PeopleDiv.style.marginBottom = "30px"; //列與列間隔
					PeopleDiv.style.borderRadius = "10px";
					PeopleDiv.id = IDArray[people];
					//PeopleDiv.className = "PeopleDiv"; 
					PeopleDiv.onmouseover = function(){
					this.style.backgroundColor = "rgb(153,255,255)";
					};
					PeopleDiv.onmouseout = function(){
						this.style.backgroundColor = "rgb(255,255,255)";
					};
					PeopleDiv.style.cursor = "pointer";
					PeopleDiv.onclick = function(){ //轉換到遊戲頁面
							window.location.assign("http://longnice.clouds.twgogo.org/Game3.php?ID="+this.id);
							};
					
					for(var col = 0; col < 4; col++){
						switch(col){
						case 0:	
							PeopleDiv.appendChild(Img);
							break;
						case 1:
							PeopleDiv.appendChild(document.createTextNode("人氣: "+PopularityArray[people]));
							PeopleDiv.appendChild(document.createElement("br"));
							break;
						case 2:
							PeopleDiv.appendChild(document.createTextNode(DateArray[people]));
							PeopleDiv.appendChild(document.createElement("br"));
							break;
						case 3:
							var Popularity = parseInt(PopularityArray[people]);
							if(Popularity<50){
								PeopleDiv.appendChild(document.createTextNode('未被發掘的'));
							}
							if(Popularity>=50 && Popularity<100){
								PeopleDiv.appendChild(document.createTextNode('略有名聲的'));
							}
							if(Popularity>=100 && Popularity<200){
								PeopleDiv.appendChild(document.createTextNode('知名的'));
							}
							if(Popularity>=200 && Popularity<500){
								PeopleDiv.appendChild(document.createTextNode('風雲人物'));
							}
							if(Popularity>=500){
								PeopleDiv.appendChild(document.createTextNode('女神'));
							}
							break;
						}
					}
					document.getElementById('photograph').appendChild(PeopleDiv);
			}
				}
			}
	
	//***Page Zoom In and Zoom Out Event***
	var zoom = 0;
	setInterval(function() {
	var PeopleDivNumber = (window.innerWidth-100) / 240; //計算一列有幾個PeopleDiv
	var newZoom = ((window.innerWidth-100)-PeopleDivNumber*10) / 240; //扣掉每個PeopleDiv之間的間距
	if (newZoom == zoom) return;
	zoom = newZoom;
	document.getElementById("photograph").style.WebkitColumnCount = Math.floor(zoom); /* Code for old Chrome and Safari*/
    document.getElementById("photograph").style.MozColumnCount = Math.floor(zoom); /* Code for Firefox*/
    document.getElementById("photograph").style.columnCount = Math.floor(zoom);
	}, 200);
	
		</script>
	</head>
	<body>
	<!--***網頁頂部元素佈局***-->
	<div class = "TopElementsDiv"> <!--***網頁頂部大分割塊***-->
	
	<div class = "LogoImgDiv"><a href="BeautyRed.php"><img src="WebImg/WebName2.jpg"/></a></div> <!--Logo圖示-->
	<div class = "SearchDiv""><form action='BeautyRed.php' method='post'>
	<select name="SearchPopularityLV">
	<option value='0'>稱號搜尋</option>
	<option value='1'>未被發掘的</option>
	<option value='2'>略有名聲的</option>
	<option value='3'>知名的</option>
	<option value='4'>風雲人物</option>
	<option value='5'>女神</option>
	</select>
	<input type='Text' name='SearchID' placeholder='id搜尋'>
	<input type='submit' value='搜尋' onclick="DynamicPeopleTable()">
	</form>
	</div>
	
	<div class="Ex_FB_Div">
	<ul>
	<li class="explanation" onclick="Explanation()">說明</li>
	<li class="FBfans"><a href="https://www.facebook.com/BeautyRed-674630072703276/" class="FBfans">FB粉絲團</a></li>
	</ul>
	</div>
	
	</div>	
	<br><br><br>
	

	
	<!-- Beauty選擇版面 -->
	<center>
	<div class= "BeautyDiv" id = "photograph">
	
	<script type="text/javascript">
	DynamicPeopleTable();
	</script>
	
	</div>
	</center>
	
	
	</body>

</html>