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
   $(document).ready(function(){
   

    $.ajax({
       
        url: '<?php echo base_url()?>/index.php/homepage/get_employee',
        type: 'GET',
        dataType:'json',
        success: function(res) {
            console.log(res);
            var html='';
            var html1='';
            var i;
            for(i=0;i<res.length;i++)
            {
               html+='<tr>'+
               '<td>'+res[i].emp_name+'</td>'+
                '<td>'+res[i].emp_sal+'</td>'+
                '<td>'+res[i].emp_leave+'</td>'+
                '<td>'+res[i].emp_amount+'</td>'+
                '<td> <a style="color:white; cursor:pointer;" class="badge badge-primary edit-btn"  id="'+res[i].emp_name+'">Edit</a> &nbsp <a style="color:white; cursor:pointer;"  class="badge badge-danger delete-btn " id="'+res[i].emp_name+'" >Delete</a></td>'+
                
                '</tr>'+
               '<hr>';

             
            }
            $('#showdata').html(html);
           
        },
        error : function(){
            console.log("unable to get the data");
        }
    });


});


$(document).on("click", ".delete-btn", function () {
     var pid = $(this).attr('id');
    
    $('.btnDelete').attr('id' , pid); 
      $('#myModal').modal('show');
	  
	  
	 
});

$(document).on("click", ".btnDelete", function () {
     var pid = $(this).attr('id');
    
     $.ajax({
       
       url: '<?php echo base_url()?>/index.php/homepage/delete_employee',
       type: 'GET',
       data: {pid:pid},
      
       success: function(res) {
           window.location="<?= base_url('index.php/homepage');?>"
          },
        error : function(){
            console.log("unable to delete the data");
        }
    });

});



$(document).on("click", ".edit-btn", function () {
    $('#editModal').modal('show');
     var pid = $(this).attr('id');
     //alert(pid);

   $.ajax({
      
       url: '<?php echo base_url()?>/index.php/homepage/get_employee',
       type: 'GET',
       dataType:'json',
       success: function(res) {
           console.log(res);
           var html='';
           var html1='';
           var i;
           for(i=0;i<res.length;i++)
           {
               if(res[i].emp_name != pid)
                continue;
                else
                    html1+='  <div class="form-group">'+
                                    '<label for="post">Employee Name</label>'+
                                   
                                    '<input type="text" class="form-control" value="'+res[i].emp_name+'" name="name" id="name" required>'+
                                '</div>'+
                                '<div class="form-group">'+
                                 '   <label>Salary</label>'+
                                    '<input type="text" class="form-control" name="salary" value="'+res[i].emp_sal+'" id="salary" required>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="post">Leaves</label>'+
                                   
                                    '<input type="text" class="form-control" value="'+res[i].emp_leave+'" name="leave" id="leave" required>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="post">Amount to be paid</label>'+
                                   
                                    '<input type="text" class="form-control" value="'+res[i].emp_amount+'" name="amount" id="amount" required>'+
                                '</div>';
                              
           }
           $('#edit-modal').html(html1);
          
       },
       error : function(){
           console.log("unable to get the data");
       }
   });
    

});



</script>


  </head>

  <body>

    
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('index.php/homepage') ?>">Employee Management</a>
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

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-2">
        <br>
          <div class="list-group">
            <a href="<?php echo base_url('index.php/homepage') ?>" class="list-group-item ">Home</a>
            <a href="<?php echo base_url('index.php/addemployee') ?>" class="list-group-item">Add Employee</a>
           
          </div>
        </div>
        <div class="col-lg-10">
          <div class="card card-outline-secondary my-4">
            <div class="card-header">
             Employees
             <table class="table table-strip table-border">
            <tr>
                <th>Name</th>
                <th>Salary</th>
                <th>Leaves</th>
                <th>Amount to be paid</th>
                <th>Action</th>
            </tr>
            </div>
            <div class="card-body">
            <tbody id="showdata">
           
           </tbody>
              
              
            </div>
           
          </table>
            </div>
           
          </div>
          
        </div>
       
      </div>

    </div>
    
    <footer class="py-3 navbar-custom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Subhash</p>
      </div>
     
    </footer>
<!-- Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
    
        <div class="modal-header">
          <h4 class="modal-title">Delete the Records</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    
        <div class="modal-body">
        
          Are you sure want to delete the record?
         
          <div id="bookId"></div>
        </div>
    
        <div class="modal-footer" id="model-delete">
       
            <a  class="btn btn-danger btnDelete" >Yes</a>  
         
         		<button type="button" class="btn" data-dismiss="modal"> No </button>
        </div>
        
      </div>
    </div>
  </div>


  <div class="modal fade" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
    
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php echo form_open('homepage/edit_employee',['class'=>'form','id'=>'editForm']) ?>
        
        <div class="modal-body" id="edit-modal">

         
        </div>
    
        <div class="modal-footer" id="model-delete">
        
        <button type="submit" class="btn"> 
     YES </button>
          
         		<button type="button" class="btn" data-dismiss="modal"> 
     NO </button>
     </form>
       
        </div>
        
      </div>
    </div>
  </div>


  </body>

</html>
