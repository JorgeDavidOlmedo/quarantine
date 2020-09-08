    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                    </div>     
                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                              <?= $this->Flash->render('auth') ?>
                                <?= $this->Form->create() ?>
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>            
                                        <?= $this->Form->input('email',['class'=>"form-control", 'placeholder'=>"Email",'label'=>false,'required']); ?>
                                   
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <?= $this->Form->input('password',['class'=>"form-control", 'placeholder'=>"Password",'label'=>false,'required']); ?>
                                    </div>
                                    
                            <div class="input-group">
                                       
                                <div style="margin-top:10px" class="form-group">
                                 
                                    <div class="col-sm-12 controls">
                                      <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-success" value="Log In">
                                     
                                    </div>
                                </div>

                         <?= $this->Form->end() ?>

                        </div>                     
                    </div>  
        </div>
        
    </div>
