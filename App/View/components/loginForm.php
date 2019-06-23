<form action="login/attemptlogin" method="post">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
            </div>
        </div>
        <?php 
        
        if(is_array($this->errores()))
        {
            
            if(!empty($this->errores)){
                foreach($this->errores() as $error)
                    echo $error;
                
            }
        }
        else {
            if(!empty($this->errores)){
                echo '<a style="text:white!important;>'.$this->errores().'</a>';
            }
        }
        self::clean();
        ?>
        <div class="col-12 col-md-12">
            <div class="form-group">
                <input type="password" class="form-control" id="contact-password" name="password" placeholder="Contraseña">
            </div>
        </div>
        <div class="m-top-10"></div>
        <div class="col-6 col-md-6 col-lg-6">
            <div class="form-group">
                <button type="submit" class="btn sonar-btn white-btn" >Log in</button>
            </div>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <div class="form-group">
                <button class="btn sonar-btn white-btn">Forgot Password</button>
            </div>
        </div>
    </div>
</form>