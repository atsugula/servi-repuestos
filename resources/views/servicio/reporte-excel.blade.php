<table>
    <thead>
        <tr>
            <th><b>#</b></th>
            <th><b>CODIGO</b></th>
            <th><b>CATEGORIA</b></th>
            <th><b>NOMBRE</b></th>
            <th><b>MARCA</b></th>
            <th><b>STOCK</b></th>
            <th><b>PORCENTAJE</b></th>
            <th><b>PRECIO COSTO</b></th>
            <th><b>PRECIO VENTA</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->marca }}</td>
                <td>{{ $producto->stock ?? '0' }}</td>
                <td>{{ $producto->porcentaje ?? '0' }}</td>
                <td>{{ $producto->precio_costo ?? '0' }}</td>
                <td>{{ $producto->precio_venta ?? '0' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
