<div class="col-md-10 col-md-offset-1 form-group" style="background-color: lightgreen">
            <?= $count.'.' ?><input id="question<?=$count?>" name="question[]" type="text" class="form-control" placeholder="Question" value="<?= $question->description ?>" /><br/>
            <input type="hidden" name="question_id[]" value="<?= $question->id_questions ?>" />
            <input id="score<?=$count?>" name="score[]" type="number" class="form-control" placeholder="Score" value="<?= $question->score ?>" /><br> 
<?PHP       
    $op = 1;
    $options = array();
foreach($solutions as $solution){?>
    <input id="option<?= $count.$op ?>" name="optio<?= $count ?>n[]" type="text" class="form-control" placeholder="Option <?= $op ?>" value ="<?= $solution->description ?>" /><br> 
            <input type="hidden" name="solutio<?= $count ?>n[]" value="<?= $solution->id_solutions ?>" />
<?PHP
    
    $var = 's'.$op;
    if($solution->correct==1){
        ${"s$op"} = 1;
        array_push($options, 1);
    }else{
        ${"s$op"} = 0;
        array_push($options, 0);
    }
    
    
$op++;
} 
            
            ?>
            <p>Select the correct answers</p>
            <label>1</label><input type="checkbox" name="correc<?= $count ?>t[]" value="1" <?PHP if($options[0]==1){?>checked <?php }?> />
            
            <label>2</label><input type="checkbox" name="correc<?= $count ?>t[]" value="2" <?PHP if($options[1]==1){?>checked <?php }?>/>
            <label>3</label><input type="checkbox" name="correc<?= $count ?>t[]" value="3" <?PHP if($options[2]==1){?>checked <?php }?>/>
            <label>4</label><input type="checkbox" name="correc<?= $count ?>t[]" value="4" <?PHP if($options[3]==1){?>checked <?php }?> />
            </div>
            
