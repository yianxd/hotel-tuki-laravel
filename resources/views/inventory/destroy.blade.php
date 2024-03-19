<div class="modal fade" id="modal-delete-{{$inventory->id_inventario}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('inventory.destroy',$inventory->id_inventario)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de eliminar el registro del inventario? <br>
                    ID Inventario: {{$inventory->id_inventario}} <br>
                    ID Producto: {{$inventory->id_producto}} <br>
                    ID Habitación: {{$inventory->id_number}} <br>
                    Stock: {{$inventory->stock}} <br>
                    Responsable: {{$inventory->responsable}} <br>
                    Nota: {{$inventory->nota}} <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                </div>
            </div>
        </form>
    </div>
</div>
