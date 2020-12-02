<!DOCTYPE html>
<html>
<head>
  
   <title>Login</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Stylesheet.CSS">
</head>
<body class="bg">


<div class="container bg-light text-dark   text-center  pb-sm-5" >
      <Br>
      <h1>Packed Meal Ordering</h1> 
      <br>
      <img src = "https://pbs.twimg.com/profile_images/1101496837767397376/zdGxVOi3_400x400.png" ">
      <br>
      <br>
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>
      <br>
      <br>
     
</div>
   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
         
            <!---Header-->
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Packed Meal Login</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!--Content--->
            <div class="modal-body">
               <form action = "Loginprocess.php" method = "POST">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                     <input  type="text" class="form-control" name="Username" placeholder="Username">
                  </div>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                     <input id="Pword" type="password" class="form-control" name="Pword" placeholder="Password">
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Login</button>
               </form>
            </div>

            <!---Footer--->
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

         </div>
         
      </div>
   </div>
   

</body>
</html>