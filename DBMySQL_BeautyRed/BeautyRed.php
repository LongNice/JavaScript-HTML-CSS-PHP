<?php
//***清除掉玩家辨識碼(防刷)***
session_start();
if(isset($_SESSION['UserIdentify'])){
unset($_SESSION['UserIdentify']);
}

//***讀取Database以供JS初始顯示***
/*require 'Connect_DB.php';

//***初始讀取資料***
$query = "SELECT `id`,`Img`,`popularity`,`date` FROM `Schl_Upload`";
if($query_run = mysql_query($query)){
	$People_number = mysql_num_rows($query_run);
	for($Scan = 0; $Scan<$People_number; $Scan++){
		$query_row = mysql_fetch_assoc($query_run);
		$IDArray[$Scan] = $query_row['id'];
		$ImgArray[$Scan] =  $query_row['Img'];
		$PopularityArray[$Scan] =  $query_row['popularity'];
		$DateArray[$Scan] =  $query_row['date'];
	}
}


//***搜尋引擎***
if((isset($_POST['PopularityLV']) && !empty($_POST['PopularityLV'])) || (isset($_POST['id']) && !empty($_POST['id']))){
	$PopularityLV = $_POST['PopularityLV'];
	$id = $_POST['id'];
	$push = 0;
	if($query_run = mysql_query($query)){	
		
	//***清除初始顯示陣列***
	unset($IDArray);
	unset($ImgArray);
	unset($PopularityArray);
	unset($DateArray);
	$IDArray = array();
	$ImgArray = array();
	$PopularityArray = array();
	$DateArray = array();
	$People_number = mysql_num_rows($query_run);
	
	for($Scan = 0; $Scan<$People_number; $Scan++){
		$query_row = mysql_fetch_assoc($query_run);
		
	//***搜尋id***
		if($id == $query_row['id']){
		$IDArray[$push] = $query_row['id'];
		$ImgArray[$push] =  $query_row['Img'];
		$PopularityArray[$push] =  $query_row['popularity'];
		$DateArray[$push] =  $query_row['date'];
		}
	
	//***搜尋稱號***		
		if($PopularityLV==1 && $query_row['popularity']<50){
		$IDArray[$push] = $query_row['id'];
		$ImgArray[$push] =  $query_row['Img'];
		$PopularityArray[$push] =  $query_row['popularity'];
		$DateArray[$push] =  $query_row['date'];
		$push++;
		}else if($PopularityLV==2 && ($query_row['popularity']>=50 && $query_row['popularity']<100)){
		$IDArray[$push] = $query_row['id'];
		$ImgArray[$push] =  $query_row['Img'];
		$PopularityArray[$push] =  $query_row['popularity'];
		$DateArray[$push] =  $query_row['date'];
		$push++;
		}else if($PopularityLV==3 && ($query_row['popularity']>=100 && $query_row['popularity']<200)){
		$IDArray[$push] = $query_row['id'];
		$ImgArray[$push] =  $query_row['Img'];
		$PopularityArray[$push] =  $query_row['popularity'];
		$DateArray[$push] =  $query_row['date'];
		$push++;
		}else if($PopularityLV==4 && ($query_row['popularity']>=200 && $query_row['popularity']<500)){
		$IDArray[$push] = $query_row['id'];
		$ImgArray[$push] =  $query_row['Img'];
		$PopularityArray[$push] =  $query_row['popularity'];
		$DateArray[$push] =  $query_row['date'];
		$push++;
		}else if($PopularityLV==5 && $query_row['popularity']>=500){
		$IDArray[$push] = $query_row['id'];
		$ImgArray[$push] =  $query_row['Img'];
		$PopularityArray[$push] =  $query_row['popularity'];
		$DateArray[$push] =  $query_row['date'];
		$push++;
		}
		
	}
}
$SesrchDone = 1;
}*/

?>

<html>
	<head>
	<link rel="shortcut icon" type="image/x-icon" href="WebImg/WebIcon.jpg" />
	<title>BeautyRed</title>
	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<!--Firebase-->
		<script src="https://www.gstatic.com/firebasejs/3.4.1/firebase.js"></script>
		<script src="jquery-3.1.0.js"></script>
		<script src="jquery.lazyload.js"></script>
		<script>
		// Initialize Firebase
		var config = {
		apiKey: "AIzaSyArlwCLN8FmfLDKanR-25uiFbYa7hoilEs",
		authDomain: "beautyred-2283b.firebaseapp.com",
		databaseURL: "https://beautyred-2283b.firebaseio.com",
		storageBucket: "beautyred-2283b.appspot.com",
		messagingSenderId: "454083634527"
		};
		firebase.initializeApp(config);
		</script>
		
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
				var elements = document.getElementById(clear);
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
						Img.src = 'Buploads/'+ImgArray[people];
						Img.setAttribute('data-original','uploads/'+ImgArray[people]);
						Img.style.margin ="10 10 5 10";
						Img.width = '230';
						Img.id = people;
						$("Img").lazyload({
							threshlod : 200,
							effect : "fadeIn"
						});
						Img.onload = function(){
						this.height = 230*(this.naturalHeight/this.naturalWidth);
						if(this.height>310){
							this.height = 310;
						}
						};
						
					var PeopleDiv = document.createElement('div');
					PeopleDiv.style.float="left";
					PeopleDiv.style.width="250";
					PeopleDiv.style.height = "385";
					PeopleDiv.id = IDArray[people];
					PeopleDiv.onmouseover = function(){
					this.style.backgroundColor = "rgb(153,255,255)";
					};
					PeopleDiv.onmouseout = function(){
						this.style.backgroundColor = "rgb(255,255,255)";
					};
					PeopleDiv.style.cursor = "pointer";
					PeopleDiv.onclick = function(){ //轉換到遊戲頁面
							window.location.assign("http://longnice.clouds.twgogo.org/Game.php?PeopleID="+this.id);
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
			
		</script>
	</head>
	<body>
	<div style = "background-color:white;">
	<div style = "float:left; margin-left:30px;"><a href="BeautyRed.php"><img src="WebImg/WebName2.jpg"/></a></div> <!--Logo圖示-->
	<div style = "float:left; margin-left:80px; margin-top:15px;"><form action='BeautyRed.php' method='post'>
	<select name="PopularityLV">
	<option value='0'>稱號搜尋</option>
	<option value='1'>未被發掘的</option>
	<option value='2'>略有名聲的</option>
	<option value='3'>知名的</option>
	<option value='4'>風雲人物</option>
	<option value='5'>女神</option>
	</select>
	<input type='Text' name='id' placeholder='id搜尋'>
	<input type='submit' value='搜尋' onclick="DynamicPeopleTable()">
	</form></div>
	<div style = "float:right; margin-right:30px;"><a href="https://www.facebook.com/BeautyRed-674630072703276/"><img src="WebImg/FB-icon.png"></a></div> <!--FB粉絲團-->
	<div style="float:right; margin-right:30px;"><img src="WebImg/Explanation2-icon.png" onclick="Explanation()" style="cursor:pointer;""></div> <!--說明圖示-->
	</div>	
	<br><br><br>
	<hr>

	
	<!-- Beauty選擇版面 -->
	<center>
	<div id = "photograph" style="margin-top:10px; margin-left:30px; margin-right:30px; float:left;">
	
	<script type="text/javascript">
	DynamicPeopleTable();
	</script>
	
	</div>
	<br>
	
	
	</center>
	</body>

</html>