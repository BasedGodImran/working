<?php
ob_start();

session_start();

$yourname			=	'';

$youremail			=	'';

$yourphonenumber	=	'';

$meetingname			=	'';

$start_date			=	'';

$start_time			=	'';

$end_date			=	'';

$end_time			=	'';

$numberofattendees	=	'';

$room_preference	=	'';

$meetingpurpose		=	'';

$additionalnotes	=	'';

$errors				=	array();

$room_types			=	array('BIG SUR'=>'BIG SUR','CHEETAH' => 'CHEETAH','EL CAPITAN'=>'EL CAPITAN','HIGH SIERRA'=>'HIGH SIERRA','LEOPARD '=>'LEOPARD','LION'=>'LION', 'MAVERICKS' => 'MAVERICKS', 'MOJAVE' => 'MOJAVE', 'MOUNTAIN LION' => 'MOUNTAIN LION', 'PANTHER' => 'PANTHER', 'PUMA' => 'PUMA', 'SIERRA' => 'SIERRA', 'SNOW LEOPARD' => 'SNOW LEOPARD', 'TIGER' => 'TIGER', 'YOSEMITE' => 'YOSEMITE' );

// $receiver			=	array('BIGSUR1'=>'','LABS'=>'imran_s_ali@apple.com','OFFICE'=>'aialisimran@gmail.com','BIG SUR'=>'basedgodimran@gmail.com','BRIEFING ROOM'=>'basedgodimran@gmail.com','BREAKOUT ROOM'=>'basedgodimran@gmail.com');
$receiver			=	array('BIGSUR'=>'basedgodimran@gmail.com','EL CAPITAN'=>'appledevelopercenter@apple.com','CHEETAH' => 'appledevelopercenter@apple.com' ,'HIGH SIERRA'=>'appledevelopercenter@apple.com','LEOPARD'=>'appledevelopercenter@apple.com','LION'=>'appledevelopercenter@apple.com', 'MAVERICKS' => 'appledevelopercenter@apple.com', 'MOJAVE' => 'appledevelopercenter@apple.com', 'MOUNTAIN LION' => 'appledevelopercenter@apple.com', 'PANTHER' => 'appledevelopercenter@apple.com', 'PUMA' => 'appledevelopercenter@apple.com', 'SIERRA' => 'appledevelopercenter@apple.com', 'SNOW LEOPARD' => 'appledevelopercenter@apple.com', 'TIGER' => 'appledevelopercenter@apple.com', 'YOSEMITE' => 'appledevelopercenter@apple.com');
     
if(count($_POST)>0)
{

	$yourname			=	$_REQUEST['yourname'];

	$youremail			=	$_REQUEST['youremail'];
	
	$yourphonenumber	=	$_REQUEST['yourphonenumber'];

	$meetingname		=	$_REQUEST['hostname'];
	
	$start_date			=	$_REQUEST['start_date'];
	
	$start_time			=	$_REQUEST['start_time'];
	
	$end_date			=	$_REQUEST['end_date'];
	
	$end_time			=	$_REQUEST['end_time'];
	
	$numberofattendees	=	$_REQUEST['numberofattendees'];
	
	$room_preference	=	$_REQUEST['room_preference'];
	
	$meetingpurpose		=	$_REQUEST['meetingpurpose'];
	
	$additionalnotes	=	$_REQUEST['additionalnotes'];

	$list = array (
		array('Name', 'Email','Phone Number', 'Meeting Name', 'Booking Date & time', 'No of Attendees', 'Room Type', 'Meeting Purpose', 'Additional Notes'),
		array($yourname, $youremail,$yourphonenumber,$meetingname, $start_date.' '.$start_time.' to'.$end_date.' '.$end_time, $numberofattendees, $room_preference, $meetingpurpose, $additionalnotes)
	);
	$fp = fopen('file.csv', 'w');
	foreach ($list as $fields) {
		fputcsv($fp, $fields);
	}
	fclose($fp);

	if(strlen(trim($yourname))==0)
	{
		
		$errors[]		=	'Please enter your name.';
	
	}
	else
	if(strlen(trim($youremail))==0)
	{
		
		$errors[]		=	'Please enter your email.';
	
	}
	else
	if(strlen(trim($yourphonenumber))==0)
	{
		
		$errors[]		=	'Please enter your phone number.';
	
	}
	else
	if(strlen(trim($meetingname))==0)
	{
		
		$errors[]		=	'Please enter your meeting name.';
	
	}

	else
	if(strlen(trim($start_date))==0)
	{
		
		$errors[]		=	'Please select start date.';
	
	}
	else
	if(strlen(trim($start_time))==0)
	{
		
		$errors[]		=	'Please select start time.';
	
	}
	else
	if(strlen(trim($end_date))==0)
	{
		
		$errors[]		=	'Please select end date.';
	
	}
	else
	if(strlen(trim($end_time))==0)
	{
		
		$errors[]		=	'Please select end time.';
	
	}
	else
	if(strlen(trim($numberofattendees))==0)
	{
		
		$errors[]		=	'Please enter number of attendees.';
	
	}
	else
	if(strlen(trim($room_preference))==0)
	{
		
		$errors[]		=	'Please select room preference.';
	
	}
	else
	if(strlen(trim($meetingpurpose))==0)
	{
		
		$errors[]		=	'Please enter the meeting purpose.';
	
	}
	
/*	echo "<pre>";
	
	print_r($_REQUEST);
	
	print_r($errors);
	*/
	
	$to 			= $receiver[$room_preference];
	 
	$from 			= 'aialisimran@gmail.com'; 
	
	$fromName 		= 'Apple Booking'; 
	 
	$subject 		= "Booking Request"; 
	 
	$htmlContent = ' 
		<html> 
		<head> 
			<title>YOUR WEBSITE NAME</title> 
		</head> 
		<body> 
			<h1>New Booking</h1> 
			<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
				<tr> 
					<th align="left">Name:</th><td>'.$yourname.'</td> 
				</tr> 
				<tr style="background-color: #e0e0e0;"> 
					<th align="left">Email:</th><td>'.$youremail.'</td> 
				</tr> 
				<tr> 
					<th align="left">Phone Number:</th><td>'.$yourphonenumber.'</td> 
				</tr> 
					<th align="left">Meeting Name:</th><td>'.$meetingname.'</td> 
				<tr> 
					<th align="left">Booking Date & time:</th><td>'.$start_date.' '.$start_time.' to'.$end_date.' '.$end_time.' </td> 
				</tr> 
				<tr style="background-color: #e0e0e0;"> 
					<th align="left">No of Attendees:</th><td>'.$numberofattendees.'</td> 
				</tr> 
				<tr> 
					<th align="left">Room Type:</th><td>'.$room_preference.'</td> 
				</tr> 
				<tr style="background-color: #e0e0e0;"> 
					<th align="left">Meeting Purpose:</th><td>'.$meetingpurpose.'</td> 
				</tr>  
				<tr> 
					<th align="left">Additional Notes:</th><td>'.$additionalnotes.'</td> 
				</tr>
			</table> 
		</body> 
		</html>'; 
	 
	// Set content-type header for sending HTML email 
$from = $fromName." <".$from.">";  
$headers = "From: $from"; 
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  

$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
$htmlContent = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  

$file_name = basename('./file.csv'); 
$file_size = filesize('./file.csv'); 
 
$htmlContent .= "--{$mime_boundary}\n"; 
$fp =    @fopen('./file.csv', "rb"); 
$data =  @fread($fp, $file_size); 
@fclose($fp); 
$data = chunk_split(base64_encode($data)); 
$htmlContent .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .  
"Content-Description: ".$file_name."\n" . 
"Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .  
"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 

$htmlContent .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 

	// $headers = "MIME-Version: 1.0" . "\r\n"; 
	// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
	 
	// // Additional headers 
	// $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 

	mail($to, $subject, $htmlContent, $headers, $returnpath);
	
	$_SESSION['message']	=	'Your request has been sent.';
	
	header('location:index.php');
	
	exit;

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Developer Center Booking</title>
<meta content="" name="description">
<meta content="" name="keywords">
<!-- Favicons -->
<link href="assets//apple-touch-icon.png" rel="apple-touch-icon">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body id="top">
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-between"> <a href="www.chorus.apple.com" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid" style="float:left;">
    <h5 style="float:left; margin-top:10px; color:#000;">Apple Developer Center</h5>
    </a>
    <nav id="navbar" class="navbar">
      <ul>
	   
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i> </nav>
  </div>
</header>
<!-- End Header -->
<main id="main">
  <section  class="breadcrumbs">
    <div class="container">
      <?php
	
	if(isset($_SESSION['message']))
	{
	?>
      <div class="alert alert-success" role="alert">
        <?=$_SESSION['message']?>
      </div>
      <?php
	}
	?>
      <div class="d-flex justify-content-between align-items-center">
        <h2 style="padding:10px 0px;"><b>REQUEST A ROOM</b></h2>
      </div>
    </div>
  </section>
  <section id="portfolio-details" class="portfolio-details" style="padding-bottom:10px;">
    <div class="container">
		<div class="row">
			<div class="col-12" style="text-align:center; padding-bottom:30px;">
				<img src="images/UpdateMap.jpg" alt="Image" usemap="#workmap">
				<map name="workmap">
					<area shape="rect" coords="204,261,55,53" alt="BIG SUR" class="rooms" data-id="1">
					<area shape="rect" coords="527,217,586,264" alt="CATALINA" class="rooms" data-id="2"> 
					<area shape="rect" coords="588,130,682,265" alt="EL CAPITAN" class="rooms" data-id="3">
					<area shape="rect" coords="789,132,688,264" alt="YOSEMITE" class="rooms" data-id="4">
					<area shape="rect" coords="859,46,787,94" alt="CHEETAH" class="rooms" data-id="5"> 
					<area shape="rect" coords="1005,260,893,175" alt="MOJAVE" class="rooms" data-id="6">
					<area shape="rect" coords="895,131,1003,48" alt="MAVERICKS" class="rooms" data-id="7">
					<area shape="rect" coords="1010,131,1107,50" alt="HIGH SIERRA" class="rooms" data-id="8">
					<area shape="rect" coords="1009,260,1107,175" alt="SIERRA" class="rooms" data-id="9">
					<area shape="rect" coords="1117,130,1164,48" alt="PUMA" class="rooms" data-id="10">
					<area shape="rect" coords="1170,130,1215,46" alt="PATHER" class="rooms" data-id="11">
					<area shape="rect" coords="1141,260,1219,207" alt="MOUNTAIN LION" class="rooms" data-id="12">
					<area shape="rect" coords="1225,97,1304,48" alt="TIGER" class="rooms" data-id="13">
					<area shape="rect" coords="1227,152,1306,105" alt="LEOPARD" class="rooms" data-id="14">
					<area shape="rect" coords="1225,205,1304,154" alt="SNOW LEOARD" class="rooms" data-id="15">
					<area shape="rect" coords="1225,262,1306,209" alt="LION" class="rooms" data-id="16">
				</map>
			</div>
		</div>
      <div class="row">
        <div class="col-lg-12">
          <p>The Apple Developer Center features a variety of developer meetings spaces. Hover over each room to learn more.

		 <p>  <p>
		 <b>Note:</b> The rooms on the first floor are dedicated to in-person gatherings 
			with developers and other third-party partners. If you would like to book a room for an internal 
			meeting, please book a conference room on the second floor of the Apple Developer Center using iCal.
			<br><br>
		

			<p> <b> CONTACT INFORMATION</b> <p>
			

        </div>
      </div>
    </div>
  </section>
  <section id="booknow" class="breadcrumbs" style="margin-top:0px;padding-top:0px;">
    <div class="container" >
      <div class="d-flex justify-content-between align-items-center" id="">
        <h2 style="padding:10px 0px;"><b> </b></h2>
      </div>
      <div class="row gy-4">
      </div>
	  <div class="row">
		  <div class="col-lg-8">
			<form name="form1" method="post">
				<div class="form-group">
				<label for="exampleInputEmail1"> NAME</label>
				<input type="text" class="form-control" name="yourname" value="<?=$yourname?>" id="yourname" required="true" placeholder="Enter Your Name">
				</div>
				<div class="form-group">
				<label for="exampleInputEmail1"> EMAIL</label>
				<input type="email" class="form-control" name="youremail" value="<?=$youremail?>" id="youremail" required="true" placeholder="Enter Your Email">
				</div>
				<div class="form-group">
				<label for="exampleInputPhoneNumber1"> PHONE NUMBER</label>
				<input type="text" class="form-control" name="yourphonenumber" value="<?=$yourphonenumber?>" id="yourphonenumber" required="true" placeholder="Enter Your Phone Number">
				<p><p>
				</div>
				<div class="form-group">
		
						<br><br>


					<p> <b>MEETING DESCRIPTION </b> <p>
						
		
							<div class="form-group">
				<label for="exampleInputPassword1">MEETING NAME</label>
				<input type="text" class="form-control" name="hostname"  value="<?=$hostname?>" id="hostname" placeholder="Meeting Name">
				</div>
				<label for="exampleInputPassword1"><p>DATE & TIME OF MEETING<p></label>
				<p id="basicExample">
					<input type="text" name="start_date" value="<?=$start_date?>" class="date start" required="true"   placeholder= "Date" />
					<input type="text" name="start_time"  value="<?=$start_time?>" class="time start" required="true" placeholder= "Time"/>
					to
					
					<input type="text" name="end_time"  value="<?=$end_time?>" class="date end" required="true" placeholder= "Date"/>
					<input type="text" name="end_date"  value="<?=$end_date?>" class="time end" required="true"  placeholder= "Time"   />
				</p>
				</div>
				<div class="form-group">
				<label for="exampleInputPassword1">ROOM CAPACITY NEEDED</label>
				<input type="text" class="form-control" name="numberofattendees"  value="<?=$numberofattendees?>" id="numberofattendees"  required="true" placeholder="Room Capacity Needed">
				</div>
				<div class="form-group">
				<label for="exampleInputPassword1">ROOM PREFERENCE</label>
				<select class="form-control form-control-sm" name="room_preference" required="true">
					<option value="">SELECT A ROOM</option>
					<?php
					
					foreach($room_types as $room_type)
					{
					?>
					<option value="<?=$room_type?>" <?php if($room_type==$room_preference){?>  selected="selected"<?php }?> >
					<?=$room_type?>
					</option>
					<?php
					}
					?>
				</select>
				</div>
				<div class="form-group">
				<label for="exampleFormControlTextarea1">MEETING DETAILS (e.g. Purpose, type of meeting, etc.)</label>
				<textarea class="form-control" id="meetingpurpose" name="meetingpurpose" required="true" rows="3" ><?=$meetingpurpose?>
		</textarea>
				</div>
				<div class="form-group">
				<label for="exampleFormControlTextarea1">ADDITONAL NOTES (e.g. Catering, meal tickets, equipment, etc.)</label>
				<textarea class="form-control" id="additionalnotes" name="additionalnotes" rows="3"><?=$additionalnotes?>
		</textarea>
		
				</div>
				<button type="submit" class="btn btn-primary" style="margin-top:5px;">Submit</button>
				<p>(Room requests should be made 24 hours in advance.)<p>
			</form>
		  </div>
		  <div class="col-lg-4">
			  <div class="padding10 resultDiv">
				  <div class="m-bot15" style="text-align:center">
				  	<img class="hover_img">
				  </div>
				  <div>
					  <div class="hover_text_title"> </div>
					  <div class="hover_text"></div>
				  </div>
			  </div>
		  </div>
	  </div>
    </div>
  </section>
</main>
<!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="container py-4">
    <div class="copyright"> &copy; Copyright <strong><span>Apple</span></strong>. All Rights Reserved </div>
  </div>
</footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="assets/css/magnific-popup.css">
<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="assets/js/jquery.min.js"></script>
<!-- Magnific Popup core JS file -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
  $('.image-link').magnificPopup({type:'image'});
    });
  </script>
<script src="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.css" />
<script src="lib/pikaday.js"></script>
<link rel="stylesheet" type="text/css" href="lib/pikaday.css" />
<script src="lib/jquery.ptTimeSelect.js"></script>
<link rel="stylesheet" type="text/css" href="lib/jquery.ptTimeSelect.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />
<script src="lib/moment.min.js"></script>
<script src="lib/site.js"></script>
<script src="dist/datepair.js"></script>
<script src="dist/jquery.datepair.js"></script>
<script>
	const roomsData = [
		{
			id: 1,
			image_name: "bigsure1.png",
			title: "<b>BIG SUR<b>",
			content: "<p> Capacity: 177 <p>    <p> Big Sur is a state-of-the-art space designed to support in-person, live broadcast, studio recording, and content post production to support content delivery to our worldwide developer audience.<p>  <p> Big Sur is managed by Elaine Flores.<p> "
			
			
			


		},
		{
			id: 2,
			image_name: "meet.jpeg",
			title: "<b>CATALINA<b>",
			content: "<p> Capacity: 6 <p> Catalina is a dedicated breakout room for El Capitan and Yosemite. It is not bookable on its own.<p>"
		},
		{
			id: 3,
			image_name: "IMG_0907.jpg",
			title: "<b>EL CAPITAN<b>",
			content: "<p> Capacity: 16 <p>    <p>This spacious executive briefing room feature a 4K HDR video screen, AVCN, a dedicated catering space, and is perfect for presentations and extended meetings. <p>  "
			
		},
		{
			id: 4,
			image_name: "IMG_0907_YOSEMITE.jpeg",
			title: "<b>YOSEMITE<b>",
			content: "<p> Capacity: 16 <p>    <p>This spacious executive briefing room feature a 4K HDR video screen, AVCN, a dedicated catering space, and is perfect for presentations and extended meetings. <p>  "
		},
		{
			id: 5,
			image_name: "IMG_5571_CHEETAH.jpg",
			title: "<b>CHEETAH<b>",
			content: "<p>Capacity: 6<p> This traditional meeting room features AVCN and whiteboards. <p>"
		},
		{
			id: 6,
			image_name: "IMG_5551 2_MOJAVE.jpeg",
			title: "<b>MOJAVE<b>",
			content: "<p>Capacity: 16 seats for developers, 4 for staff<p> This room is an ideal space to host NPI labs, workshops, and other developer-based experiences.<p>"
		},
		{
			id: 7,
			image_name: "IMG_5578_Mavericks.jpeg",
			title: "<b>MAVERICKS<b>",
			content: "<p>Capacity: 16 seats for developers, 4 for staff<p> This room is an ideal space to host NPI labs, workshops, and other developer-based experiences.<p>"
		},
		{
			id: 8,
			image_name: "IMG_5552_HIGHSIERRA.jpeg",
			title: "<b>HIGH SIERRA<b>",
			content: "<p>Capacity: 16 seats for developers, 4 for staff<p> This room is an ideal space to host NPI labs, workshops, and other developer-based experiences.<p>"
		},
		{
			id: 9,
			image_name: "IMG_4921.JPEG",
			title: "<b>SIERRA<b>",
			content: "<p>Capacity: 16 seats for developers, 4 for staff<p> This room is an ideal space to host NPI labs, workshops, and other developer-based experiences.<p>"
		},
		{
			id: 10,
			image_name: "IMG_5573_PUMA.jpg",
			title: "<b>PUMA<b>",
			content: "<p>Capacity: 8 <p> This meeting room features AVCN, whiteboards, a traditional conference table and soft seating to meet with developers. <p>"
		},
		{
			id: 11,
			image_name: "IMG_5561_PANTHER.jpg",
			title: "<b>PANTHER<b>",
			content: "<p>Capacity: 8 <p> This meeting room features AVCN, whiteboards, a traditional conference table and soft seating to meet with developers. <p>"
		},
		{
			id: 12,
			image_name: "IMG_5575_MNTLION.jpeg",
			title: "<b>MOUNTAIN LION<b>",
			content: "<p>Capacity: 10 <p> This unique meeting pod includes AVCN, whiteboards, soft seating and a collaboration table. <p>Additionally it features a high fidelity Dolby Atmos audio system, with high performance speakers, and Dolby Vision video.<p>"
		},
		{
			id: 13,
			image_name: "meet.jpeg",
			title: "<b>TIGER<b>",
			content: "<p>Capacity: 10 <p> This unique meeting pod includes AVCN, whiteboards, soft seating and a collaboration table. <p>Additionally it features a high fidelity Dolby Atmos audio system, with high performance speakers, and Dolby Vision video.<p>"
		},
		{
			id: 14,
			image_name: "meet.jpeg",
			title: "<b>LEOPARD<b>",
			content: "<p>Capacity: 10 <p> This unique meeting pod features AVCN, whiteboards, soft seating and a collaboration table.<p>"
		},
		{
			id: 15,
			image_name: "meet.jpeg",
			title: "<b>SNOW LEOPARD<b>",
			content: "<p>Capacity: 10 <p> This unique meeting pod features AVCN, whiteboards, soft seating and a collaboration table.<p>"
		},
		{
			id: 16,
			image_name: "meet.jpeg",
			title: "<b>LION<b>",
			content: "<p>Capacity: 10 <p> This unique meeting pod includes AVCN, whiteboards, soft seating and a collaboration table.<p> Additionally it features a high fidelity Dolby Atmos audio system, with high performance speakers, and Dolby Vision video.<p>"
		}
	];

	$('.rooms').hover(function(){
		n=parseInt($(this).data('id'))-1;
		$('.hover_img').attr('src','./images/'+roomsData[n]['image_name']);
		$('.hover_text_title').html(roomsData[n]['title']);
		$('.hover_text').html(roomsData[n]['content']);

		$(".resultDiv").addClass("border");

	})
	$('.rooms').mouseleave(function(){
		$('.hover_img').attr('src','');
		$('.hover_text_title').html("");
		$('.hover_text').html("");

		$(".resultDiv").removeClass("border");
	})
    // 
    $('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#basicExample .date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    // 
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
</script>
</body>
</html>
<?php unset($_SESSION['message']);?>
