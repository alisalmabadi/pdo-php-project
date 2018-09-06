<?php include "core/onload.php";?>

      <?php
	   if(!isset($_GET['id'])){
transfer("index.php");

	   }
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
    <!-- Bootstrap core CSS -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
          <link rel="shortcut icon" href="img/faveicon.ico">

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
<title>اطلاعیه|اتحادیه انجمن های اسلامی دانش آموزان</title>
<?php
$result = $connect -> query("SELECT `meta_keyword`,`meta_description` FROM `$tbl_theme_setting`");
$rows = $result->fetch(PDO::FETCH_ASSOC);

?>
<meta name="keywords" content="<?php echo $rows['meta_keyword']; ?>" />
<meta name="description" content="<?php echo $rows['meta_description']; ?>" />
<?php
$s = "SELECT  * FROM `$tbl_meta_tag`";
$res = $connect->query($s);
while($row = $res->fetch(PDO::FETCH_ASSOC)){
?>
	<meta name="<?=$row['name'];?>" content="<?=$row['content'];?>">
<?php
}
?>




  </head>
<?php
	
	$sqlam="SELECT * FROM `$tbl_system_setting`";
	$r=$connect->query($sqlam);
	$rowsham=$r->fetch(PDO::FETCH_ASSOC);
	?>
  <body>
     <nav id="mobile-nav" style="background:#<?=$rowsham["index_color"];?>;">
  <?php
  $sm="SELECT `url`,`target`,`title`,`status`,`id` FROM `$tbl_menu` WHERE `status`=1 ORDER BY `id` DESC";
  $resu=$connect->query($sm);
  
  while($rowsa=$resu->fetch(PDO::FETCH_ASSOC)){
	
  ?>
 
    <a target="<?=$rowsa['target'];?>" href="<?=$rowsa['url'];?>"><?=$rowsa['title'];?></a>
  <?php
  
  }
  ?>

  </nav>
  <div id="main">
    <nav id="desktop-nav" style="background:#<?=$rowsham["index_color"];?>;">
<a href="#" id="nav-toggle"></a>
 <?php
  $sm="SELECT `url`,`target`,`title`,`status`,`id` FROM `$tbl_menu` WHERE `status`=1 ORDER BY `id` DESC";
  $resu=$connect->query($sm);
  
  while($rowsa=$resu->fetch(PDO::FETCH_ASSOC)){
	
  ?>
 
      <a target="<?=$rowsa['target'];?>" href="<?=$rowsa['url'];?>"><?=$rowsa['title'];?></a>

	       <?php
  
  }
  ?>



         

    </nav>

  </div>
  </div>
  

<div class="col-lg-12" style="z-index:+5;">


	    
		<div class="col-md-12" style="padding: 10px;
height: 120px;" >
		
		<?php 
		$id=checkid($_GET['id']);
		$sql="SELECT `title`,`text`,`date` FROM `$tbl_news` WHERE `id`=:id";
		$result=$connect->prepare($sql);
		$result->bindParam(":id",$id);
		$result->execute();
		$rows=$result->fetch(PDO::FETCH_ASSOC);
	?>
		<h2 class="title"><?=$rows["title"];?></h2>
<p style="width: 100%;font-size:18px; direction: ltr;text-align:right;background:green;padding:5px;"> &nbsp;<?=$rows['date'];?></p>
	
		<br>
		
        </div><!--col-sm-8-->
        <div class="col-md-12">
<div class="newsha"> 
<p>
<?=$rows["text"];?>
</p>

	
		</div>
	</div>

		
	
		
		
	
	</div>
       
	
  
  <div id="particles-js"></div>
<script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/main.js"></script>
<script type="text/javascript">
$.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function(){
    particlesJS('particles-js',
      {
        "particles": {
          "number": {
            "value": 80,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#ffffff"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 5,
            "random": true,
            "anim": {
              "enable": false,
              "speed": 40,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "repulse"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true,
        "config_demo": {
          "hide_card": false,
          "background_color": "#b61924",
          "background_image": "",
          "background_position": "50% 50%",
          "background_repeat": "no-repeat",
          "background_size": "cover"
        }
      }
    );

});

$(function(){
    $('.button-checkbox').each(function(){
    	var $widget = $(this),
			$button = $widget.find('button'),
			$checkbox = $widget.find('input:checkbox'),
			color = $button.data('color'),
			settings = {
					on: {
						icon: 'glyphicon glyphicon-check'
					},
					off: {
						icon: 'glyphicon glyphicon-unchecked'
					}
			};

		$button.on('click', function () {
			$checkbox.prop('checked', !$checkbox.is(':checked'));
			$checkbox.triggerHandler('change');
			updateDisplay();
		});

		$checkbox.on('change', function () {
			updateDisplay();
		});

		function updateDisplay() {
			var isChecked = $checkbox.is(':checked');
			// Set the button's state
			$button.data('state', (isChecked) ? "on" : "off");

			// Set the button's icon
			$button.find('.state-icon')
				.removeClass()
				.addClass('state-icon ' + settings[$button.data('state')].icon);

			// Update the button's color
			if (isChecked) {
				$button
					.removeClass('btn-default')
					.addClass('btn-' + color + ' active');
			} 
            else 
            { 
                $button
					.removeClass('btn-' + color + ' active')
					.addClass('btn-default');
			}
		}
		function init() {
			updateDisplay();
			// Inject the icon if applicable
			if ($button.find('.state-icon').length == 0) {
				$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
			}
		}
		init();
	});
});

</script>
 
  </body>
</html>
