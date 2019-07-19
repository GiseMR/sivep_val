<section>
    <div class="row">
        <div class="col-md-12">
            <form id="formContacto" name="formContacto">
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <label for="DNI_CONT" class="col-sm-2 text-left control-label col-form-label">DNI</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="DNI_CONT" name="DNI_CONT" minlength="5" maxlength="8" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <label for="NOM_CONT" class="col-sm-2 text-left control-label col-form-label">Nombres</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="NOM_CONT" name="NOM_CONT">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <label for="APP_CONT" class="col-sm-2 text-left control-label col-form-label">Apellido Paterno</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="APP_CONT" name="APP_CONT">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <label for="APM_CONT" class="col-sm-2 text-left control-label col-form-label">Apellido Materno</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="APM_CONT" name="APM_CONT">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <label for="FENAC_CONT" class="col-sm-2 text-left control-label col-form-label">Fecha Nacimiento</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="FENAC_CONT" name="FENAC_CONT">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <label for="TEL_CONT" class="col-sm-2 text-left control-label col-form-label">Telefono</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="TEL_CONT" name="TEL_CONT" minlength="5" maxlength="9" require>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <label for="EMAIL_CONT" class="col-sm-2 text-left control-label col-form-label">Correo Electrónico</label>
                    <div class="col-sm-6">
                        <input type="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" id="EMAIL_CONT" name="EMAIL_CONT">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <label for="OBS_CONT" class="col-sm-2 text-left control-label col-form-label">Observación</label>
                    <div class="col-sm-6">
                        <textarea rows="2" class="form-control" id="OBS_CONT" name="OBS_CONT"></textarea>
                    </div>
            </form>
        </div>
    </div>
</section>