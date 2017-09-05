 <?php
    $submit = array('name' => 'submit', 'value' => 'Log In', 'title' => 'Log In', 'type' => 'submit',  'class' => 'btn btn-block btn-cta-primary');
    $reset = array('name' => 'reset', 'value' => 'Cancel', 'title' => 'clear', 'class' => 'btn btn-lg btn-login btn-block');
    $submit2 = array('name' => 'submit', 'value' => 'Register', 'title' => 'Sign in', 'class' => 'btn btn-main featured');
    $reset2 = array('name' => 'reset', 'value' => 'Cancel', 'title' => 'clear', 'class' => 'btn btn-main featured');

    $description = array('type' => 'text','name' => 'description','id' => 'description', 'placeholder' => 'Description', 'class' => 'form-control login-email');
    $address = array('type' => 'text','name' => 'address','id' => 'address', 'placeholder' => 'Address', 'class' => 'form-control login-email');
    $phone = array('type' => 'text','name' => 'phone','id' => 'phone', 'placeholder' => 'Phone', 'class' => 'form-control login-email');
    $birthdate = array('type' => 'date','name' => 'birthdate','id' => 'birthdate', 'placeholder' => 'Birthdate', 'class' => 'form-control login-email');
    $gender = array('type' => 'text','name' => 'gender','id' => 'gender', 'placeholder' => 'Gender', 'class' => 'form-control login-email');
    $position = array('type' => 'text','name' => 'position','id' => 'position', 'placeholder' => 'Position', 'class' => 'form-control login-email');
    $hired = array('type' => 'date','name' => 'hired','id' => 'hired', 'placeholder' => 'hired', 'class' => 'form-control login-email');
    $responsability = array('type' => 'date','name' => 'responsability','id' => 'responsability', 'placeholder' => 'responsability', 'class' => 'form-control login-email');

    $toForm = array('class' => 'login-form');
    $toForm2 = array('class' => 'subscription-form mailchimp');
    $submit3 = array('name' => 'submit', 'value' => 'Submit Now', 'title' => 'Submit Now', 'class' => 'btn btn-main featured');

    //$registrarse = array('name' => 'button', 'value' => 'Registrarse', 'title' => 'Registrarse')
    ?>
        <!-- ******Signup Section****** --> 
        <section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Quiz Registration</h2>                 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                    <?php echo form_open(base_url().'daycare/create_quiz');?>
                                    <div class="row">
                                        <div class="form-group">
                                            <?=form_error('description')?>
                                            <label class="sr-only" for="description">Name</label>
                                            <?=form_input($description)?>
                                        </div>
                                    </div>
                                    <div class="row" id="question_container">
                                        
                                    </div>
                                    <div class="row">
                                            <input id="count" type="hidden" name="count" value="">
                                            <p id="add_selection"><a href="#"><span>&raquo; Add Selection Question.....</span></a></p>
                                    </div>
                                    <div class="spacer"></div>
                                    <input id="go" name="btnSubmit" type="submit" value="Save Quiz" class="btn" />
                                    <?php echo form_close();?>
                                </div><!--//form-container-->
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//signup-section-->


<script type="text/javascript">
var count = 0;
$(function(){
    $('p#add_selection').click(function(){
        count += 1;
        $('#question_container').append(
            '<div class="col-md-10 col-md-offset-1 form-group" style="background-color: lightgreen">'+
            count + '. <input id="question' + count + '" name="question[]' + '" type="text" class="form-control" placeholder="Question" /><br/>' + 
            '<input id="score' + count +'" name="score[]' + '" type="number" class="form-control" placeholder="Score" /><br>' + 
            '<input id="option' + count + '1" name="optio'+count+'n[]' + '" type="text" class="form-control" placeholder="Option 1" /><br>' + 
            '<input id="option' + count + '2" name="optio'+count+'n[]' + '" type="text" class="form-control" placeholder="Option 2" /><br>' + 
            '<input id="option' + count + '3" name="optio'+count+'n[]' + '" type="text" class="form-control" placeholder="Option 3" /><br>' + 
            '<input id="option' + count + '4" name="optio'+count+'n[]' + '" type="text" class="form-control" placeholder="Option 4" /><br>'+
            '<p>Select the correct answers</p>'+
            '<label>1</label><input type="checkbox" name="correc'+count+'t[]" value="1" />'+
            '<label>2</label><input type="checkbox" name="correc'+count+'t[]" value="2" />'+
            '<label>3</label><input type="checkbox" name="correc'+count+'t[]" value="3" />'+
            '<label>4</label><input type="checkbox" name="correc'+count+'t[]" value="4" />'+
            '</div>');
        $("#count").val(count);
    });
    
});
</script> 