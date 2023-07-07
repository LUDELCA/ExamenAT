<div class="d-flex justify-content-center">

    <div class="card col-md-12">
        <div class="card-header text-center">
            Reporte
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="fecha_inicio">Fecha Inicio:</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" autofocus required class="form-control" autocomplete="off">
                </div>
                <div class="col-md-3">
                    <label for="fecha_fin">Fecha Fin:</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" autofocus required class="form-control" autocomplete="off">
                </div>
                <div class="col-md-3">
                    <label for="id_player">Player ID:</label>
                    <input type="text" name="id_player" id="id_player" autofocus required class="form-control" autocomplete="off">
                </div>
                <div class="col-md-3">
                    <!--<input type="submit" id="regU" class="btn btn-primary" value="Buscar">-->
                    <button type="button" class="btn btn-success" id="btn_buscar">
                        Buscar
                    </button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover" id="tbl_recargas">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Registro</th>
                                <th>Player-ID</th>
                                <th>Cliente</th>
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
        </div>
    </div>
</div>
