
    
    <div class="headline-bg">
    </div><!--//headline-bg-->         
    
    <!-- ******Video Section****** --> 
    <section class="features-video section section-on-bg">
        <div class="container text-center">
        <?php $attributes = array('class' => 'form-horizontal' ); ?>
        <?php echo form_open_multipart(base_url().'profile/save', $attributes) ?> 
            <div class="member">
                <div class="member-inner">
                    <figure class="profile text-center" align="center">
                        <img id="profile_thumb" class="img-responsive img-thumbnail" align="center" style="min-height: 350;max-height: 350; min-width: 350;max-width: 350"  src="<?= $employee->profile_picture ?>" alt=""/>
                        <div align="center" class="text-center" >
                            <input type="file" id="profile_picture" name="profile_picture" style="display: none" accept="image/jpeg,image/gif,image/png">
                        </div>
                        
                    </figure><!--//profile-->
                </div><!--//member-inner-->
            </div><br>
            <div class="blog-list blog-category-list">
                <article class="post col-md-offset-1 col-sm-offset-0 col-xs-offset-0 col-xs-12 col-md-10">
                    <div class="post-inner">
                        <div class="content">
                            <div class="date-label">
                                <?php echo form_error('name'); ?>
                                <input id="name" name="name" type="text" class="text-center" value="<?= $employee->name ?>" placeholder="Name" readonly><br>
                                <span class="job-title"><?=$employee->job?></span>
                            </div><br>
                            <div class="meta">
                                <ul class="meta-list list-inline">                                       
                                    <li class="post-author"> Hire date: <?=$hired_date?></li>
                                </ul><!--//meta-list-->                             
                            </div><!--meta-->                               
                            <div class="post-entry">
                                <dl>
                                  <?php echo form_error('address'); ?>
                                  <dt>Address</dt>
                                  <dd><input id="address" name="address"  type="text" class="text-center" value="<?= $employee->address ?>" placeholder="Address" style="width:100%" readonly></dd>
                                  </dd>
                                  <?php echo form_error('phone'); ?>
                                  <dt>phone number</dt>
                                  <dd><input id="phone" name="phone" type="text" class="text-center" value="<?= $employee->phone?>" placeholder="Phone Number" readonly></dd>
                                  <dt>Email</dt>
                                  <dd><input id="email" name="email"  type="text" class="text-center" value="<?=$user->email?>" placeholder="Email" readonly></dd>
                                </dl>
                            </div>      
                <input type="hidden" name="grabar" value="si"/>
                <button id="editButton" type="button" class="btn btn-block btn-cta-secondary">Edit Profile</button>
                <button id="saveButton" type="submit" class="btn btn-block btn-cta-primary" style="display: none;" value = "upload">Save Changes</button>                          
                        </div><!--//content-->
                    </div><!--//post-inner-->
                </article><!--//post-->
            </div><!--//blog-list--> 
        <?php echo form_close() ?>
        </div><!--//container-->
    </section><!--//feature-video-->
    
    <script type="text/javascript">

   $(document).ready(function() {
        
        $('#editButton').click(function(){
            $("#name").removeAttr("readonly");
            $("#address").removeAttr("readonly");
            $("#phone").removeAttr("readonly");
            $("#profile_picture").css("display", "inline-block");
            $("#name").focus();
            $("#editButton").hide();
            $("#saveButton").show();
        });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_thumb').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_picture").change(function(){
            readURL(this);
        });
    });

    </script>