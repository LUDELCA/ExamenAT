<div class="d-flex justify-content-center">

    <div class="card col-md-12">
        <div class="card-header text-center">
            Bancos
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <!-- <label for="texto">Buscar texto:</label> -->
                    <input type="text" name="texto" id="texto" placeholder="Buscar texto..." autofocus required class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <!--<input type="submit" id="regU" class="btn btn-primary" value="Buscar">-->
                    <button type="button" class="btn btn-success" id="btn_buscar">
                    <i class="fa-solid fa-search"></i> Buscar
                    </button>
                </div>
                <div class="col-md-4" style="text-align: right;">
                    <!--<input type="submit" id="regU" class="btn btn-primary" value="Registrar Banco">-->
                    <button type="button" class="btn btn-success" id="btn_nuevo">
                        <i class="fa-solid fa-plus"></i>
                        Registrar Banco
                    </button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover" id="tbl_bancos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Banco</th>
                                <th>Núm. Cuenta.</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_banco" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banco</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" autofocus required class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="num_cuenta">Numero de cuenta:</label>
                    <input type="num" name="num_cuenta" id="num_cuenta" required class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">¿Está seguro de eliminar este Banco?</h5>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger pull-right" id="btn_eliminar">Si, Eliminar</button>
            </div>
        </div>
    </div>
</div>


