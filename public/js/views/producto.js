/*=============================================
    CALCULAR LA GANANCIA POR PRODUCTO
=============================================*/
function calcularGanancia() {
    var costo = parseFloat($('.pCosto').val());
    var porcentaje = parseFloat($('.porcentaje').val());
    var costoPorcentaje;

    // Calculamos el porcentaje de venta del producto
    const porce = porcentaje / 100;
    costoPorcentaje = (porce * costo) + costo;

    // Redondear al siguiente múltiplo de 50
    var roundedValue = Math.ceil(costoPorcentaje / 50) * 50;
    $('.pVenta').val(roundedValue);
}

$('.porcentaje').on('change', function() {
    calcularGanancia();
});

$('.stock').on('mousedown', function() {
    calcularGanancia();
});