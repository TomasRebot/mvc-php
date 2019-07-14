<div class="card">
<div class="card-header">Crear usuario</div>
<div class="card-body">
<form action="../user/store" method="post">
    <input type="hidden" name="formId" value="usuarios">
    <!--group-->
        <div class="form-group row">
            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail :</label>
            <div class="col-md-6">
                <input type="text" id="email" class="form-control" name="email" required autofocus>
            </div>
        </div>
    <!--/group-->
    <!--group-->
        <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">Nombre de usuario : </label>
            <div class="col-md-6">
                <input type="username" id="username" class="form-control" name="username" required>
            </div>
        </div>
    <!--/group-->

        <!--checkboxs-->
        <div class="form-group row">
            <label for="grupos" class="col-md-12 col-form-label text-md-left">Grupo/s : </label>
            <div class="col-md-6 offset-md-4">
            <?php
             foreach($this->grupos as $grupo){
                
            ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="grupos[]" value="<?=$grupo->id?>"> <?=$grupo->nombre ?>
                    </label>
                </div>
            <?php  }?>
            </div>
        </div>
        <!--checkboxs-->

        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Crear
            </button>
            <a href="../index/panel" class="btn btn-danger">
                cancelar
            </a>
        </div>
</div>
</form>

</div>
<style>
.box-wrapper 
{
  z-index:99!important;
  padding:50px!important;
margin-top:50px!important;
}
header {
    background-color:black!important;
}

</style>