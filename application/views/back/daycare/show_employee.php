<style type="text/css">
    @import "compass/css3";

@import "compass/utilities/links/unstyled-link";
body{
  font-family: 'Raleway', sans-serif;
  background:url("http://www.wallpapersin.net/wallpapers/2013/03/Tokyo-Skyscrapers-485x728.jpg");
  
}
a{
  @include unstyled-link();
  color:#00BBBB;
  &:hover{
      color:#666;
  }
}
#container{
  width:400px;
  height:500px;
  @include box-shadow(#999 2px 2px 10px);
  margin:0px auto;
}
.image{
  height:275px;
  background: center center no-repeat;
  background-size:cover;
}
.info{
  height:175px;
  background:#FAFAFA;
  text-align:center;
  h1.name{
    text-transform:uppercase;
    margin:0px;
    font-weight: 400;
    letter-spacing: 3px;
    color: #5C5B5B;
    font-size: 30px;
    padding: 25px 0px 0px 0px;
  }
  h3.position{
    margin:0px;
  }
  p{
    color:#666;
    padding:0px 60px;
  }
}
.social{
  height:40px;
  background:#DAE0DE;
  text-align:center;
  padding-top:20px;
  i{
    font-size:20px;
  }
  a{
    margin:0px 10px;
    color:#666;
    &:hover{
      color:#00BBBB;
    }
  }
}
</style>

<section class="features-tabbed section">
    <div class="container">
        <h2 class="page-title text-center"><i class="fa fa-user"></i> Show Employee</h2><br><br>
            
        <div class="row">
            <div class="col-lg-4">
                 <div class="social">
                 
                 </div>
                 <div class="image" style="background-image: url(https://25.media.tumblr.com/f9cd81645ebd2f0904227b42784bbfae/tumblr_mj6r7nBfdV1s7aky5o2_r1_1280.jpg)"></div>
                  <div class="info">
                    <?php if(isset($employee)) { ?>
                        <h1><?= $employee->first_row()->name; ?></h1>
                        <h4><?= $employee->first_row()->type_employee_id ?></h4>
                        <h5>Gender: <?= $employee->first_row()->gender ?>, Birthdate: <?= $employee->first_row()->birthdate ?></h5>
                        <p>Phone: <?= $employee->first_row()->phone ?> Address: <?= $employee->first_row()->address ?><br>
                          Date of Hire: <?= $employee->first_row()->date_of_hired ?><br>
                          Date of Responsability: <?= $employee->first_row()->date_of_responsability ?>
                        </p>
                       <?php } else{ ?>
                        <h1 class="name">panda smith</h1>
                    <h3 class="position"><a href="#">Creative director</a></h3>
                    <p>Large bet on myself in round one pansy i more, but you go</p>
                    <?php }?>
                    
                   
                  </div>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    
                    <a href=""><i class="fa fa-linkedin"></i></a>
                    
                    <a href=""><i class="fa fa-facebook"></i></a>
                    
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    
                    <a href=""><i class="fa fa-github-alt"></i></a>
                  </div>
            </div>
            <div class="col-lg-7">
                <div class="panel panel-danger">Workshops</div>
                <div id="dvData" class="table-responsive">
                            <table class="table table-bordered display" id="my_table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Vendor</th>
                                    <th>Finish Date</th>
                                    <th>Qualification</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                        <?php foreach ($employee->result() as $emp) {?>
                                <tr>
                                    <td>Child happiness</td>
                                    <td><a href="show_employee/<?= $emp->id_employees ?>"><?= $emp->name ?></a></td>
                                    <td><?= $emp->birthdate ?></td>
                                    <td><?= $emp->id_employees ?></td>
                                    <td class="success">Completed</td>
                               </tr>
                            <?php }?><!-- ENDFOREACH -->
                            </tbody>
                            </table>
                        </div>
            </div>
                    
        </div>
    </div>
</section>
        
<script type="text/javascript" src="<?=base_url().'assets/js/main.js'?>"></script>

            
      