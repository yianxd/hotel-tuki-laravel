<div class="modal fade" id="modal-delete-{{$product->id_producto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('product.destroy', $product->id_producto)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                /*modulo para la alerta  de eliminacion*/
                <div class="modal-body">
                    ¿Está seguro de eliminar el producto? <br>
                    Código: {{$product->id_producto}} <br>
                    Nombre del producto: {{$product->nombre_producto}} <br>
                    Descripción: {{$product->description}} <br>
                    Cantidad: {{$product->cantidad}} <br>
                    Precio: {{$product->price}} <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                </div>
            </div>
        </form>
    </div>
</div>
