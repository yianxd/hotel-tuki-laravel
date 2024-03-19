<div class="modal fade" id="modal-delete-{{$bed->id_number}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
/* This code snippet is creating a modal dialog box for deleting a bed entry. Here's a breakdown of
what each part of the code is doing: */
        <form action="{{ route('beds.destroy', $bed->id_number) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Cama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de eliminar la siguiente cama?</p>
                    <ul>
                        <li><strong>Número de Habitación:</strong> {{ $bed->id_number }}</li>
                        <li><strong>Descripción:</strong> {{ $bed->descripcion }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>
