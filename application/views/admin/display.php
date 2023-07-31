<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <script src="<?= base_url(); ?>assets/js/jquery.js" type="text/javascript" ></script>
    <title>Admin</title>
    <style type="text/css">
    .dis {
            pointer-events: none;
        }
    .match {
            color: green;
            transition: color 0.9s;
        }

    .notmatch {
            color: red;
            transition: color 0.9s;
    }
    </style>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1>jQuery <span class="text-success">True</span> / <span class="text-danger">False</span></h1>
    </div>
    </div>
    <div class="container">
    <?= br(2); ?>
    <div class="row ">
      <div class="col-md-3 mb-5">
      <a href="<?= base_url('admin/index') ?>" class="btn btn-info float-right">Add More Questions</a>
      </div>
    </div>
	<div class="row">
        <div class="col-md-12">
        <br>
  	   <?php if($feedback = $this->session->flashdata('feedback')): 
  	   		$feedback_class = $this->session->flashdata('feedback_class');
  	   	?>
      <div class="col-sm-10">
        	<div class="alert alert-dismissible <?= $feedback_class ?>">  
     			 <?=  $feedback //display alert message if article is inserted ?> 
        	</div>
      </div>
       <?php endif; ?>
       <br>
        </div>
    </div>
	<table class="table">
		<thead>
			<tr>
				<td> <strong>Sr. No.</strong> </td>
				<td> <strong>Image</strong> </td>
                <td> <strong>Question</strong> </td>
                <td> <strong>Action</strong> </td>
                <td style="visibility:hidden">  <strong>Answer</strong> </td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php  if(count($data)): ?>
				<?php $count = $this->uri->segment(3,0); ?>
				<?php foreach ($data as $question): ?>
				<td><?= ++$count  ?></td>
				<td> <img src="<?= $question['image'];?>" height="200px" width="200px"> </td>
                <td class="align-middle"><h4><?= $question['question']; ?></h4></td>
                <td class="align-middle">
                    <p class="ans"></p> 
                    <!-- <button class="btn btn-info" id="true" >Update</button>  -->
                    <?=  anchor("admin/edit_question/{$question['id']}",'Edit',['class' =>'btn btn-primary mb-2']); //using anchor function insetead of base_url() / passing id using GET() ?>
                    <br>
                    <?= 
							form_open('admin/delete_question'),
							form_hidden('id', $question['id']), //pass A_ID
							form_submit(['name' => 'submit', 'value' => 'Delete',
							'class' => 'btn btn-danger delete_button' ]),
							form_close();
							?>
                </td>
                <td id="answer" style="visibility:hidden"><?= $question['answer']; ?></td>
			</tr>
				<?php endforeach; ?>
			<?php else: ?>
			<tr>
				<td colspan="4">No Records Found.</td>
				<?php endif; ?>
			</tr>
		</tbody>
	</table>      
    </div>

<script type="text/javascript">
    jQuery(document).ready(function(){ 
     
    }); 
</script>
</body>
</html>