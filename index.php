
<?php include 'includes/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>

    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jquery.datetimepicker.css" rel="stylesheet"/>  
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    
</head>
<body>
      
<div class="container">
        
     <div class=" text-center mt-5 text-success">
        <h1>Form </h1>
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <?php  
                        validate_data();
                        ?>
                                <form id="contact-form"   method="POST">

                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Firstname </label> <input id="form_name" type="text" name="fname" class="form-control" placeholder="Please enter your firstname " required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Lastname </label> <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname " required="required" data-error="Lastname is required."> </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Email </label> <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email " required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="DesignTitle">Design Title:</label>
                                         <input type="text" name="designTitle" id="DesignTitle"  placeholder="Design title"  class="form-control" required data-error="Design title is empty"> 
                                       </div>
                                        
                                    </div>
                                </div>
                            </div>

                     
                                                            
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                            <label class="form-check-label" for="exampleCheck1"> Start Campaign immediately</label>
                                        </div>
                                    </div>  
                                    </div>


                                 <div class="row pt-6" id="date_p" style="visibility: hidden;">
                                    <div class="col-md-5">
                                        <label>Campaign Starting Date</label>
                                    </div>
                                    <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" id="picker" class="form-control" placeholder="Choose Date" name="date_picker" required data-error="date field can't be empty">
                                    </div>
                                    </div>
                                 </div>



           
                                        
                                    <div class="row pt-4">
                                    <legend class="col-form-label col-sm-3 pt-0">Gender:</legend>
                                    <div class="col-md-9">
                                    <div class="form-check form-group form-check-inline">
                                        <input class="form-check-input" type="radio" name="RadioOptions" id="inlineRadio1" value="Male"  class="form-control"> 
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-group form-check-inline">
                                        <input class="form-check-input" type="radio" name="RadioOptions" id="inlineRadio2" value="Female"  class="form-control">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    </div>
                                    </div>
                                       
                                                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            Colour:
                                            <div style="visibility:hidden;">
                                            <select id="myselect"  name="color_selectM" class="form_color1 form-control">

                                                <option value="White">White</option>
                                                <option value=" Black"> Black</option>
                                                <option value="Red">Red</option>
                                                <option value="Grey">Grey</option>
                                            </select>
                                            </div>
                                            <div style="visibility:hidden;">
                                            <select  name="color_selectF" class="form-control form_color2">
                                               
                                                <option value="White">White</option>
                                                <option value="Black">Black</option>
                                            </select>
                                            </div>
                                        </div>
                                        </div>
                                          <div class="col-md-12 pt-2"> <input type="submit" name="done" class="btn btn-success btn-send pt-2 btn-block " value="Submit"> </div> 
                                  </div>       


                        </form>
                    </div> <!--container end-->
                </div> <!--card-body end-->
            </div><!--card end-->
        </div> <!--col end-->
    </div><!--main row end-->
 </div>


<script src="assets\js\jquery.min.js"></script>
<script src="assets\js\popper.min.js"></script>
<script src="assets\js\bootstrap.min.js"></script>
<script src="assets\js\jquery.datetimepicker.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>

<script>
$ (' #picker' ) . datetimepicker ({
timepicker: false,
datepicker: true,
format: 'Y-m-d' , 
value: '2020-11-14',
weeks : true
});

$(document).ready(function() { 
                $("#exampleCheck1").click(function() { 
                    if ($("input[type=checkbox]").prop( 
                      ":checked")) { 
                       
                    } else { 
                        $("#date_p").css( "visibility","visible");
                    } 
                }); 
            }); 

    $(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='RadioOptions']:checked").val();
            if(radioValue == 'Male'){
                $(".form_color1").css( "visibility","visible");
                $(".form_color2").css( "visibility","hidden");
            }else {
                $(".form_color2").css( "visibility","visible");
                $(".form_color1").css( "visibility","hidden");
            }
        });
    });

</script>

</body>
</html>

