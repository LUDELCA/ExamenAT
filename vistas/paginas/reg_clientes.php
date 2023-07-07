<div class="d-flex justify-content-center">

    <div class="card col-md-12">
        <div class="card-header text-center">
            Clientes
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
                        <i class="fa-solid fa-user-plus"></i> 
                        Registrar Cliente
                    </button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover" id="tbl_clientes">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Player-ID</th>
                                <th>Cliente</th>
                                <th>Tipo Doc.</th>
                                <th>Núm. Doc.</th>
                                <th>Celular</th>
                                <th>correo_electronico</th>
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

<div class="modal fade" id="modal_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="id_player">Player ID:</label>
                    <input type="text" name="id_player" id="id_player" autofocus required class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" autofocus required class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" required class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="tipo_doc">Tipo de documento:</label>
                    <select class="form-select" aria-label="Default select example" name="tipo_doc" id="tipo_doc">
                        <option value="1">DNI</option>
                        <option value="2">CARNET DE EXTRANJERIA</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="num_doc">Número de documento:</label>
                    <input type="num" name="num_doc" id="num_doc" required class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="celular">Celular:</label>
                    <input type="tel" name="celular" id="celular" required class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="correo_electronico">Correo Electrónico:</label>
                    <input type="email" name="correo_electronico" id="correo_electronico" required class="form-control" autocomplete="off">
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
                <h5 class="modal-title" id="exampleModalLabel">¿Deseas eliminar el Cliente?</h5>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger pull-right" id="btn_eliminar">Eliminar</button>
            </div>
        </div>
    </div>
</div>