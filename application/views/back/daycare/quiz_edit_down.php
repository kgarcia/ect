       
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
var count = <?php echo $count ?>;
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