<!DOCTYPE html>
<html>

	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

		<style>

			*{
				font-family: 'Rubik';
				list-style: none;
				text-decoration: none;
				margin: 0;
    			padding: 0;
			}

			#dine_end_div{
				display: flex;
				flex-direction: row;
				flex-wrap: nowrap;
				text-align: center;
				align-items: center;
				margin: 20px 30px;
			}
			
			#dine_end_div hr{
				height: 3px;
				flex: 1;
				background-color: rgb(24, 22, 22);
				border-radius: 10px;
				border: 1px solid #fff;
			}

			#dine_end_div h3{
				flex: 0.5;
			}

			#dine_imgs_div{
				display: flex;
				flex-direction: row;
				flex-wrap: wrap;
				justify-content: center;
				margin-bottom: 30px;
			}

			#dine_imgs_div img{
				width:250px;
				height:250px;
				margin: 10px;
				border-radius: 10px;
				border: 1px solid #000;
				object-fit: cover;
				box-shadow: 1px 2px 5px 2px #00000031;
			}
		</style>

	</head>
<body>
	
	<?php include'navbar.php'; ?>

	<div class = "panel-body">
			
		<h2 style="text-align: center; text-decoration: underline;">&nbsp; DINE AND LOUNGE &nbsp;</h2>
		
		<div id="dine_imgs_div">
			<img src = "../dine/1.jpg"/>
			<img src = "../dine/2.jpg"/>
			<img src = "../dine/3.jpg"/>
			<img src = "../dine/4.jpg"/>
			<img src = "../dine/5.jpg"/>
			<img src = "../dine/6.jpg"/>
			<img src = "../dine/7.jpg"/>
			<img src = "../dine/8.jpg"/>
			<img src = "../dine/9.jpg"/>
			<img src = "../dine/10.jpg"/>
			<img src = "../dine/11.jpg"/>
			<img src = "../dine/12.jpg"/>
		</div>
		
		<div id="dine_end_div">
			<hr>
			<h2 style="text-align: center; margin: 0px 10px;">&#x2B16; &#x2B16; &#x2B16; Thank You. &#x2B16; &#x2B16; &#x2B16;</h2>
			<hr>
		</div>
	</div>
	
</body>
	
</html>