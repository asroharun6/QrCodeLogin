<?php session_start();?>




<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>QR Code | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="cam.js"></script>
		<!-- DataTables -->

                 <center><video id="preview" width="320px" style="border-radius:10px;"></video></center>
				
				<style>
video {
  max-width: 100%;
  height: auto;
}
</style>
		
		
	
		
				
       <form action="" method="POST" id="myForm" style="margin-bottom: 1px;z-index: -1;display: none;">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border"> Form Scan </legend>
            <input type="text" name="qrcode" id="code" autofocus>
          </fieldset>
        </form>
		
	<?php

$host = 'localhost';
$name = 'root';
$dbname = 'login_qrcode_2022';
$dbpass = '';

$con = mysqli_connect($host,$name,$dbpass,$dbname);

if(!$con) {

	die("Database ora konek". mysqli_connect_error());
}

		
		if(!empty($_POST['qrcode'])){
		
		$qrcode = $_POST['qrcode'];
		$arr = explode('|', $qrcode);
		
		$username = $arr[1];
		$pass = $arr[2];

		$sql = "select * from users WHERE username = '$username' AND password = '$pass' AND IsActive = 1";
		$resultSQL =mysqli_query($con, $sql);
		$result = mysqli_fetch_array($resultSQL);
		if (mysqli_num_rows($resultSQL) > 0 )
		
		
		{   echo ("<script language='javascript'>
             window.alert('Error saving record.')
             window.location.href='javascript:history.back()'
           </script>");
 
		$_SESSION['fullname'] = $result['fullname'];

		$_SESSION['Photo'] = $result['Photo'];

		$_SESSION['username'] = $result['username'];
		$_SESSION['IsActive'] = TRUE;
		
		header("location:admin.php");
			
				
 exit;
		}
  }
  else
     {
 echo '';
  }
 
		?>
				  
                </div>
				
                </div>
				
            </div>
						
        </div>
			
        <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });
		   
		   
		   			   
 var shutter = new Audio();
 shutter.autoplay = true;
 shutter.src = navigator.userAgent.match(/Firefox/) ? 'beep.ogg' : 'beep.mp3';


 // play sound effect
 shutter.play();
 

           scanner.addListener('scan',function(c){
               document.getElementById('code').value=c;
               document.forms[0].submit();
           });
        </script>
		
		  <embed src="beep.mp3" style="visibility:hidden" />

    </body>
</html>