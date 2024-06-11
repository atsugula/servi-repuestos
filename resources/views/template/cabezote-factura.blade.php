<div class="cabezote">
    <h2 class="mt16">YAMA-STORE</h2>
    <div class="cabezote-direccion">
        <span class="mt8 text-left">Dirección: Cra 6 # 7-03</span>
        <span class="mt8 text-right">Telefono: 314 5869506</span>
        <h2 class="mt8">Tuluá - Valle del Cauca</h2>
    </div>
    <h2 class="mt8 text-left margen-left">FACTURACION POS No: {{ $codigo }}</h2>
    <h2 class="mt8 text-left margen-left"><?php date_default_timezone_set('America/Bogota'); ?></h2>
    <h2 class="mt8 text-left margen-left">Fecha: {{ date('Y-m-d h:i:s a', time()) }}</h2>
</div>