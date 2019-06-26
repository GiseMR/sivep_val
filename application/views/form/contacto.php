<section>       
                            <div class="row">
                                <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="nroValuacioncontacto" class="col-sm-9 text-right control-label col-form-label">Código</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="nrovalcontac" name="nrovalcontac" value="<?= $codigo ?>" readonly>
                                                </div>
                                                <label for="FECVALCONTAC" class="col-sm-9 text-right control-label col-form-label">Fecha</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="fecvalcontac" name="fecvalcontac" value="<?= date('Y-m-d') ?>" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="DNI" class="col-sm-2 text-left control-label col-form-label">DNI</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="dni" name="dni" minlength="5" maxlength="8" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="NOMBRE" class="col-sm-2 text-left control-label col-form-label">NOMBRES</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="app" class="col-sm-2 text-left control-label col-form-label">APELLIDO PATERNO</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="app" name="app">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="APM" class="col-sm-2 text-left control-label col-form-label">APELLIDO MATERNO</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="apm" name="apm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="FENAC" class="col-sm-2 text-left control-label col-form-label">FECHA NACIMIENTO</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="fenac" name="fenac">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="TELEFONO" class="col-sm-2 text-left control-label col-form-label">TELEFONO</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="telefono" name="telefono"minlength="5" maxlength="9" require>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="CORREO" class="col-sm-2 text-left control-label col-form-label">CORREO ELECTRONICO</label>
                                                <div class="col-sm-6">
                                                    <input type="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" id="correo" name="correo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="PAGO" class="col-sm-2 text-left control-label col-form-label">COSTO DE VALORIZACION S/.</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="pago" name="pago">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="OBSERVACION" class="col-sm-2 text-left control-label col-form-label">OBSERVACION</label>
                                                <div class="col-sm-6">
                                                <textarea rows="2" class="form-control" id="obs" name="obs"></textarea>                                                    
                                            </div>
                                            
                                </div>
                            </div>
</section>