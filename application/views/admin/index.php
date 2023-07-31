<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" > -->
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <script src="<?= base_url(); ?>assets/js/jquery.js" type="text/javascript" ></script>
    
    <title>Admin</title>
    <style type="text/css">
    .button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
    border-radius:50%;
    font-size:25px;
    }
    .button5:hover{
      background-color: #555555;
      cursor:pointer;
      transition: background-color 0.5s;
    }
    .button5:active{
      background-color: white;
      cursor:pointer;
      transition: background-color 0.5s;
    }
    .button5:visited{
      background-color: white;
      cursor:pointer;
      transition: background-color 0.5s;
      border: 2px solid #555555;
      border-radius:50%;
    }

    </style>
</head>
<body>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1>jQuery <span class="text-success">True</span> / <span class="text-danger">False</span></h1>
    </div>
  </div>
  <div class="container" style="margin-top: 1%">
    <?php if($feedback = $this->session->flashdata('feedback')): 
      $feedback_class = $this->session->flashdata('feedback_class');
      ?>
      <div class="col-sm-10">
        <div class="alert alert-dismissible <?= $feedback_class ?>">  
          <?=  $feedback //display alert message if article is inserted ?> 
        </div>
      </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-md-6">
        <?php  echo form_open_multipart('admin/store_question'); ?>
          <div class="form-group">
            <label >Question:</label>
            <input type="text" class="form-control" id="question" name="question"  placeholder="Enter Question">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1"> Select Image:</label>
            <?php echo form_upload(['name' => 'image']); ?>
          </div>
          <div class="form-group">
            <label >Answer:</label> <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="answer" id="true" value="true">
            <label class="form-check-label" for="inlineRadio1">True</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="answer" id="false" value="false">
            <label class="form-check-label" for="inlineRadio2">False</label>
          </div>
          </div>  <hr>
          <?php  
          echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-sucess']),
            form_submit(['name'=> 'submit','value'=>'Save Question','class'=>'btn btn-primary']); 
            ?>
       <?php  echo form_close(); ?>
      </div>
      <div class="col-md-6">
        <div class="row mt-5">
          <div class="col-md-12 " style="height:60px;">
            <?php echo form_error('question'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 " style="height:60px;color:#DC3545">
          <?php if(isset( $upload_error)) {echo $upload_error; } ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 " style="height:60px;">
            <?php echo form_error('answer'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-center mt-5">
      <div class="col-md-3 mt-5 mb-5">
      <a href="<?= base_url('admin/select') ?>" class="btn btn-info float-right">Seel All Questions</a>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    
    jQuery(document).ready(function(){ 
      var count = 0; 
      $('#add').click(function(){
        count++;
        //$('#submit')..attr("id","submit"+count);
        let add = $("#before").html();
        $('#after').append(add).before();
        
      });
    });    
</script>
</body>
</html>