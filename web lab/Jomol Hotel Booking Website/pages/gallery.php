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
			
			#gallery_end_div{
				display: flex;
				flex-direction: row;
				flex-wrap: nowrap;
				text-align: center;
				align-items: center;
				margin: 20px 30px;
			}
			
			#gallery_end_div hr{
				height: 3px;
				flex: 1;
				background-color: rgb(24, 22, 22);
				border-radius: 10px;
				border: 1px solid #fff;
			}

			#gallery_end_div h3{
				flex: 0.5;
			}

			#gallery_imgs_div{
				display: flex;
				flex-direction: row;
				flex-wrap: wrap;
				justify-content: center;
				margin-bottom: 30px;
			}

			#gallery_imgs_div img{
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
			
			<h2 style="text-align: center; text-decoration: underline;">&nbsp; GALLERY &nbsp;</h2>
			
			<div id="gallery_imgs_div">
				<img src = "../Gallery/1.jpg"/>
				<img src = "../Gallery/2.jpg"/>
				<img src = "../Gallery/3.jpg"/>
				<img src = "../Gallery/4.jpg"/>
				<img src = "../Gallery/5.jpg"/>
				<img src = "../Gallery/6.jpg"/>
				<img src = "../Gallery/7.jpg"/>
				<img src = "../Gallery/8.jpg"/>
				<img src = "../Gallery/9.jpg"/>
				<img src = "../Gallery/10.jpg"/>
				<img src = "../Gallery/11.jpg"/>
				<img src = "../Gallery/12.jpg"/>
			</div>
			
			<div id="gallery_end_div">
				<hr>
				<h2 style="text-align: center; margin: 0px 10px;">&#x2B16; &#x2B16; &#x2B16; Thank You. &#x2B16; &#x2B16; &#x2B16;</h2>
				<hr>
			</div>
		</div>
	</body>
	
</html>