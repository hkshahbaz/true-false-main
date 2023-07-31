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
    <title>User</title>
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
    <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <h5><span class="text-success">Correct: +5</span> | <span class="text-danger">Incorrect: 0</span>
                        | <span class="text-primary">Total Score: <span id="totalscore"></span></span></h5>
                </div>
                <div class="row">
                    <div class="col-md-5 ">
                        <h2>Your Score: </h2>
                    </div>
                    <div class="col-md-4 ">
                        <h2 id="score" class="text-primary"> 0</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 ">
                        <h2>Result: </h2>
                    </div>
                    <div class="col-md-6 ">
                        <h2 id="result"> </h2>
                    </div>
                </div>
            </div>
    </div>
	<h2 class="text-info">Choose the Correct Answer</h2>
	
	<table class="table">
		<thead>
			<tr>
				<td> <strong>Sr. No.</strong> </td>
				<td> <strong>Image</strong> </td>
                <td> <strong>Question</strong> </td>
                <td> <strong>Answer</strong> </td>
                <!-- <td style="visibility:hidden">  <strong>Answer</strong> </td> -->
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
                    <button class="btn btn-info" id="true" >True</button> 
                    <button class="btn btn-info" id="false" >False</button> 
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
        // var question;
        // var data = JSON.parse('<?php// echo json_encode($data); ?>'); 
        // // console.log(data);
        // for(var j in data)
        //     {
        //       var ans =  data[j].answer;
        //       console.log(ans);
        //     }
        var score= 0 ;
        var count = $('.ans').length;
        var totalScore = 0;
        for(var i=0;i<count;i++){
            totalScore = totalScore +5 ;
        $('#totalscore').html(totalScore);
        $('#true').attr("id","true"+i);
        $('#false').attr("id","false"+i);
        $('#answer').attr("id","answer"+i);

        $('#true'+i).click(function(){
            
            var answer = $(this).closest('td').next().text();
            if(answer == "true"){
                $("#result").html("<b>Correct</b>").removeClass('notmatch').addClass('match');
                $(this).removeClass('btn-info').addClass('btn-success');
                score = score + 5;
                $("#score").html(score);
                var fal = $(this).closest("button").next().attr("id");
                $('#'+fal).addClass('dis');
                $(this).addClass('dis');
            }
            else{
                $(this).removeClass('btn-info').addClass('btn-danger');
                $("#result").html("<b>Incorrect</b>").addClass('notmatch');
                var fal = $(this).closest("button").next().attr("id");
                $('#'+fal).addClass('dis');
                $(this).addClass('dis');
            }
        });
        $('#false'+i).click(function(){
            
            var answer = $(this).closest('td').next().text();
            if(answer == "false"){

                $("#result").html("<b>Correct</b>").removeClass('notmatch').addClass('match');
                $(this).removeClass('btn-info').addClass('btn-success');
                score = score + 5;
                $("#score").html(score);
                var tru = $(this).closest("button").prev().attr("id");
                $('#'+tru).addClass('dis');
                $(this).addClass('dis');
            }
            else{
                $(this).removeClass('btn-info').addClass('btn-danger');
                $("#result").html("<b>Incorrect</b>").addClass('notmatch');
                var tru = $(this).closest("button").prev().attr("id");
                $('#'+tru).addClass('dis');
                $(this).addClass('dis');
            }
        });
        }
        //   $('#true').click(function(){
        //     var ans = $(this).closest('.answer').html();
        //     console.log(ans);
        //   });
    }); 
</script>
</body>
</html>