<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <title>Employee management system by Subhash</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/image/icon.ico');?>"/>
    <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
    <!--<script src="<?= base_url('assets/js/myjquery.js');?>"></script>-->
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
    <script>
    $('document').ready(function(){
 
 $('#ename').on('blur', function(){
  var username = $('#ename').val();
  //alert(username);
  $.ajax({
       
       url: '<?php echo base_url()?>/index.php/login/exist_user',
       type: 'GET',
       
       data: {username:username},

       success: function(res) {
        //alert(username);
         
          },
        error : function(){
            console.log("unable to process");
        }
    });
  });

  $('#leaves').on('blur', function(){
  var leaves = $('#leaves').val();
  var sal= $('#salary').val();
  
  var amount=(sal-(sal/30)*leaves);

  $('#amount').val(amount);
 
  });
 });	
   


   </script>

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Employee Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('index.php/homepage') ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/homepage/logout') ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="row">

        <div class="col-lg-3">
        <br>
          <div class="list-group">
          <a href="<?php echo base_url('index.php/homepage') ?>" class="list-group-item ">Home</a>
            <a href="<?php echo base_url('index.php/addemployee') ?>" class="list-group-item">Add Employee </a>
         
          </div>
        </div>
      
        <div class="col-lg-9">
		<br>
       <!--<form class="form-horizontal" action="/action_page.php">-->
       <?php echo form_open('addemployee/add_new',['class'=>'form-horizontal','id'=>'postForm']) ?>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Enter the details  : </label>
      <div class="col-sm-10">
      
        <input type="text" class="form-control" name="name" placeholder="Employee name" id="ename" required>
        <span id="span1"></span>
        <input type="text" class="form-control" name="salary" placeholder="Salary" id="salary" required>
        <input type="text" class="form-control" name="leaves" placeholder="Leaves" id="leaves" required>
        <input type="text" class="form-control" name="amount" placeholder="Amount to be paid" id="amount">
      
      </div>
    </div>
   
  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn">Add</button>
      </div>
    </div>
  </form>

        </div>

      </div>

    </div>
    <footer class="py-2 navbar-custom">
      <div class="container">
        <p class=" text-center text-white">Copyright &copy; Subhash</p>
      </div>
    </footer>
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>

  </body>

</html>
