
<?php
include'connect.php';
    
    $img = $_POST['image'];
    $regno = $_POST['guest_name'];
    $number = $_POST['guest_mobile'];
    $regno=strtoupper($regno);
    $folderPath = "uploads/log/";
    
  
            $image_parts = explode(";base64,", $img);
    // $image_type_aux = explode("uploads/log/", $image_parts[0]);
    // $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    
	date_default_timezone_set("Asia/Calcutta");  
    $time=date('His');
	$photo=$regno.date("dmY").$time ;
    $fileName =  $photo. '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    //print_r($fileName);
   $query1="insert into log(regno,photo,out_time) values('$regno','$file','---')";
    $query2="insert into guest_log(name,mob,photo,outtime) values('$regno' ,'$regno','$file','---')";
    
    $log=mysqli_query($con,$query1);
	$res=mysqli_query($con,$query2);
     if($res)
	 {
    
		echo "<script>alert('Loged in successfully')</script>";
        echo"<script>document.location.href='login.php'</script>";
	 }
	 else
	 {
		echo "<script>alert(' NOT Loged in  Try Again')</script>";
        echo"<script>document.location.href='login.php'</script>";
	 }
 
        


    // $image_parts = explode(";base64,", $img);
    // // $image_type_aux = explode("uploads/log/", $image_parts[0]);
    // // $image_type = $image_type_aux[1];
  
    // $image_base64 = base64_decode($image_parts[1]);
    
	// date_default_timezone_set("Asia/Calcutta");  
    // $time=date('His');
	// $photo=$regno.date("dmY").$time ;
    // $fileName =  $photo. '.png';
  
    // $file = $folderPath . $fileName;
    // file_put_contents($file, $image_base64);
  
    // //print_r($fileName);
    // $query="insert into log(regno,photo,out_time) values('$regno','$file','---')";
	// $res=mysqli_query($con,$query);
    //  if($res)
	//  {
    
	// 	echo "<script>alert('Loged in successfully')</script>";
    //     echo"<script>document.location.href='login.php'</script>";
	//  }
	//  else
	//  {
	// 	echo "<script>alert(' NOT Loged in  Try Again')</script>";
    //     echo"<script>document.location.href='login.php'</script>";
	//  }
?>
