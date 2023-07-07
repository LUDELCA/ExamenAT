<div class=" d-flex justify-content-center">
    <div class="card col-md-4">
        <div class="card-header text-center">
            Buscar Cliente <i class="fa-solid fa-street-view"></i>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="num" name="id_player" id="id_player" placeholder="Player ID" class="form-control" autocomplete="off">
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success" id="btn_consultar" style="width: 100%;">
                                <i class="fa-solid fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 div_resultado" hidden>
                    <label for="nombre">nombre y apellido:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" disabled>
                </div>
                <div class="mb-6 div_resultado" hidden>
                    <label for="msaldo">Saldo:</label>
                    <input type="number" name="msaldo" id="msaldo" class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 div_sin_resultado"></div>
    <div class="card col-md-8 div_resultado" hidden>
        <div class="card-header text-center">
            Recarga
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="canal">Canal de comunicación:</label>
                    <select class="form-select" aria-label="Default select example" name="canal" id="canal">
                        <option value="1">Whatsapp</option>
                        <option value="2">Telegram</option>
                        <option value="3">Messenger</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="banco">Banco:</label>
                    <select class="form-select" aria-label="Default select example" name="banco" id="banco">
                        <option value="0">Elegir</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="comprobante">comprobante del Depósito:</label>
                    <input type="file" name="comprobante" id="comprobante" required class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="monto">Monto:</label>
                    <input type="email" name="monto" id="monto" required class="form-control" autocomplete="off">
                </div>
                <div class="col-md-6">
                    <label for="monto">Fecha del Deposito:</label>
                    <input type="datetime-local" name="fecha" id="fecha" required class="form-control" autocomplete="off">
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <br>
                    <button type="button" class="btn btn-success" id="btn_recargar" style="width: 100%;">
                        <i class="fa-solid fa-save"></i> Recargar
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<hr>
<div class="row div_resultado" hidden>
    <div class="col-md-12">
        <table class="table table-hover" id="tbl_recargas">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Registro</th>
                    <th>Canal</th>
                    <th>Banco</th>
                    <th>Monto</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal_recarga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recarga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="mc_comprobante">comprobante del Depósito:</label>
                    <img src="" class="img-fluid" alt="" id="mc_comprobante" style="border: 1px solid;border-radius: 20px;width: 100%;">
                </div>
                <div class="mb-3">
                    <label for="mc_canal">Canal:</label>
                    <select class="form-select" aria-label="Default select example" name="mc_canal" id="mc_canal">
                        <option value="1">Whatsapp</option>
                        <option value="2">Telegram</option>
                        <option value="3">Messenger</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="mc_banco">Banco:</label>
                    <select class="form-select" aria-label="Default select example" name="mc_banco" id="mc_banco">
                        <option value="0">Elegir</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="mc_monto">Monto:</label>
                    <input type="email" name="mc_monto" id="mc_monto" class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="mc_monto">Fecha:</label>
                    <input type="datetime-local" name="mc_fecha" id="mc_fecha" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_editar">Editar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">¿Está seguro de eliminar esta Transacción?</h5>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger pull-right" id="btn_eliminar">Si, Eliminar</button>
            </div>
        </div>
    </div>
</div>