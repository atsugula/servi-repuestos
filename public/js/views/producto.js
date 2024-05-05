/*=============================================
    CALCULAR LA GANANCIA POR PRODUCTO
=============================================*/
function calcularGanancia(){
    var costo = parseFloat($('.pCosto').val())
    var porce = parseFloat($('.porcentaje').val()), costoPorcentaje
    if(porce>=100){
        //se multiplica el costo por el porcentaje y se
        //divide en 100 luego sumamos al costo, para el resultado final
        costoPorcentaje = ((costo*porce)/100)+costo
    }else{
        //Se resta el porcentaje ingresado(100-porci) y se guarda en esta varible -> porcentaje
        //Se divide el costo por el porcentaje restado y se multiplica por 100
        porce = (100-porce)/100
        costoPorcentaje = costo/porce
    }
    $('.pVenta').val(Math.round(costoPorcentaje))
}
$('.porcentaje').on('change',function(){
    calcularGanancia()
})
$('.stock').on('mousedown',function(){
    calcularGanancia()
})
