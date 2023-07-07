<!-- 
<div class="container-fluid bg-ligth">
    <div class="container">
        <ul class="nav nav-justified py-2 nav-pills" style="background-color: #484645;">
            <li class="nav-item">
                <a href="index.php?pagina=clientes" class="nav-link <?php echo ($_GET['pagina'] == 'clientes') ? 'active' : ''; ?>">Clientes</a>
            </li>
            <li class="nav-item">
                <a href="index.php?pagina=recargas" class="nav-link <?php echo ($_GET['pagina'] == 'recargas') ? 'active' : ''; ?>">Recargas</a>
            </li>
            <li class="nav-item">
                <a href="index.php?pagina=bancos" class="nav-link <?php echo ($_GET['pagina'] == 'bancos') ? 'active' : ''; ?>">Bancos</a>
            </li>
            <li class="nav-item ">
                <a href="index.php?pagina=reporte" class="nav-link <?php echo ($_GET['pagina'] == 'reporte') ? 'active' : ''; ?>">Reporte</a>
            </li>
        </ul>
    </div>
</div> -->


<div class="container-fluid bg-ligth">
    <div class="container">
        <ul class="nav flex-column py-2 nav-pills">
            <li class="nav-item text-center">
                <a href="index.php?pagina=recargas" data-bs-toggle="tooltip" data-bs-placement="right" title="Recargas" class="nav-link <?php echo ($_GET['pagina'] == 'recargas') ? 'active' : ''; ?>"><i class="fa-solid fa-money-bill-transfer"></i></i></a>
            </li>
            <li class="nav-item text-center">
                <a href="index.php?pagina=clientes" data-bs-toggle="tooltip" data-bs-placement="right" title="Clientes" class="nav-link <?php echo ($_GET['pagina'] == 'clientes') ? 'active' : ''; ?>"><i class="fa-solid fa-person-circle-plus"></i></a>
            </li>
            <li class="nav-item text-center">
                <a href="index.php?pagina=bancos" data-bs-toggle="tooltip" data-bs-placement="right" title="Bancos" class="nav-link <?php echo ($_GET['pagina'] == 'bancos') ? 'active' : ''; ?>"><i class="fa-solid fa-building-columns"></i></a>
            </li>
            <li class="nav-item text-center">
                <a href="index.php?pagina=reporte" data-bs-toggle="tooltip" data-bs-placement="right" title="Reporte" class="nav-link <?php echo ($_GET['pagina'] == 'reporte') ? 'active' : ''; ?>"><i class="fa-solid fa-table"></i></a>
            </li>
        </ul>
    </div>
</div>