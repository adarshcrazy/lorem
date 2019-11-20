

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <br> <br>
  <form  enctype="multipart/form-data" id="idForm">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="text1" name="name" placeholder="Enter Name">
    <br>
    <label for="exampleInputEmail1">Roll</label>
    <input type="text" class="form-control" id="text4" name="roll" placeholder="Enter Roll No">
    <br>
    <label for="exampleInputEmail1">Email</label>
    <input type="email"  required class="form-control" id="text" name="email" placeholder="Enter Email">
    <br>
    <label for="exampleInputEmail1">Date of Birth</label>
    <input type="date" class="form-control" id="text3"  name="dob"placeholder="Enter DOB">
    <br>
    <label for="exampleInputEmail1">Photo</label>
    <input type="file" class="form-control" name="images" placeholder="Enter text"><br>
    <button type="submit" id ="btn">Sumit</button>
   
  </div>
</div>

</body>
</html>


<script type="text/javascript">



$(document).ready(function(e){
    // Submit form data via Ajax
    $("#idForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'page.php',
            data: new FormData(this),
            dataType: 'text',
            contentType: false,
            cache: false,
            processData:false,
           
            success: function(response){ //console.log(response);
            	alert(response);
            }
        });
    });
});


	


</script>


