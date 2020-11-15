<?php


function cleanHtml($string)
{
	return htmlentities($string);
}

function validate_data(){
    $min_val=3;
	$max_val=20;
    $error_messages=[];
    if(isset($_REQUEST["done"])){
        $fname=cleanHtml($_POST['fname']);
        $surname=cleanHtml($_POST['surname']);
        $email=cleanHtml($_POST['email']);
        $designTitle=cleanHtml($_POST['designTitle']);
        $RadioOptions=cleanHtml($_POST['RadioOptions']);
        $color_selectM=cleanHtml($_POST['color_selectM']);
        $color_selectF=cleanHtml($_POST['color_selectF']);
        $date_picker=cleanHtml($_POST['date_picker']);

        if(strlen($fname) <$min_val){
            $error_messages[]="minimum {$min_val} chareacters";
            }
        if(strlen($surname) <$min_val){
            $error_messages[]="minimum {$min_val} chareacters";
            }
        if(strlen($designTitle) <$min_val){
            $error_messages[]="minimum {$min_val} chareacters";
            }

         
        if(strlen($fname) >$max_val){
            $error_messages[]="maximum {$max_val} chareacters";
            }
        if(strlen($surname) >$max_val){
            $error_messages[]="maximum {$max_val} chareacters";
            }

        if(strlen($designTitle) > 64){
            $error_messages[]="maximum 64 chareacters";
            }
        
        if($RadioOptions == null){
            $error_messages[]="please select gender";
        }
        
        if(empty( $color_selectF)){
            $error_messages[]="please select color";
        }
        
            
        if(empty($color_selectM)){
            $error_messages[]="please select color";
        }
        
            function valid_email($str) {
                return (!preg_match_all("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
                }
            function domain_exists($email, $record = 'MX'){
                list($user, $domain) = explode('@', $email);
                return checkdnsrr($domain, $record);
            }
      
        if(!empty($error_messages)){
            foreach ($error_messages as $error) {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>warning:</strong>$error
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
            }

        }else{
          insert_data($fname,$surname ,$email ,$designTitle,$RadioOptions ,$color_selectM,$color_selectF,$date_picker);
			echo "<div class='alert alert-success'>You've successfully inserted one record</div>";
          
        }
    
   }
}

function insert_data($fname,$surname ,$email ,$designTitle,$RadioOptions ,$color_selectM,$color_selectF,$date_picker){
    include_once("db.php");	
    $fname=$_POST['fname'];
    $surname=$_POST['surname'];
    $email=$_POST['email'];
    $designTitle=$_POST['designTitle'];
    $RadioOptions=$_POST['RadioOptions'];
    $color_selectM=$_POST['color_selectM'];
    $color_selectF=$_POST['color_selectF'];
    $date_picker=$_POST['date_picker'];

    if($RadioOptions == 'Male'){
      $sql="INSERT INTO `information` (`id`, `fname`, `lname`, `email`, `design_title`, `gender`, `colours`, `start_date`) VALUES (NULL, '$fname', '$surname', '$email', '$designTitle', '$RadioOptions', '$color_selectM', '$date_picker')";
      if (mysqli_query($conn, $sql)) {
         return true;
      } 
}

if($RadioOptions == 'Female'){
    $sql="INSERT INTO `information` (`id`, `fname`, `lname`, `email`, `design_title`, `gender`, `colours`, `start_date`) VALUES (NULL, '$fname', '$surname', '$email', '$designTitle', '$RadioOptions', '$color_selectF', '$date_picker')";
    if (mysqli_query($conn, $sql)) {
       return true;
    } 
}
  
}