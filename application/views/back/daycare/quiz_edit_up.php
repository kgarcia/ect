 <?php
    $submit = array('name' => 'submit', 'value' => 'Log In', 'title' => 'Log In', 'type' => 'submit',  'class' => 'btn btn-block btn-cta-primary');
    $reset = array('name' => 'reset', 'value' => 'Cancel', 'title' => 'clear', 'class' => 'btn btn-lg btn-login btn-block');
    $submit2 = array('name' => 'submit', 'value' => 'Register', 'title' => 'Sign in', 'class' => 'btn btn-main featured');
    $reset2 = array('name' => 'reset', 'value' => 'Cancel', 'title' => 'clear', 'class' => 'btn btn-main featured');

    $description = array('type' => 'text', 'value' => $quiz->description ,'name' => 'description','id' => 'description', 'placeholder' => 'Description', 'class' => 'form-control login-email');
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
                                    <?php echo form_open(base_url().'daycare/edit_quiz');?>
                                    <div class="row">
                                        <div class="form-group">
                                            <?=form_error('description')?>
                                            <input type="hidden" name="quiz_id" value="<?= $quiz->id_quizzes ?>"/>
                                            <label class="sr-only" for="description">Name</label>
                                            <?=form_input($description)?>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="quizztype_id" id="quizztype_id">
        
        					                  <option>Select a language</option>
        
        					                  
        					                    <option value="1" <?php if ($quiz->quiztype_id == 1){ ?> selected="selected" <?php }?>>English</option>
        					                    <option value="2" <?php if ($quiz->quiztype_id == 2){ ?> selected="selected" <?php }?>>Spanish</option>
        					                                 
        					                </select> 
                                        </div>
                                    </div>
                                    <div class="row" id="question_container">
                                 