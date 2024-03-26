           <!--
            *
            *
            * Modal
            *
            *     -->
            <dialog id="modal">
                <form action="{{route('changeRoom',$booking->id_booking)}}"></form>
                <h1>Habitaciones disponibles</h1>
                    @csrf
                    @method('PUT')
                <div class="col-lx-12">
                    <table class="table">
                    <div>
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th>numero</th>
                                    <th>tipo</th>
                                    <th>capacidad</th>
                                    <th>precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                <tr>
                                    <td>
                                        <input type="radio" name="id_number" @if ($booking->id_number==$room->id_number)
                                            @checked(true)
                                        @endif>
                                    </td>
                                    <td id="id_number">{{$room->id_number}}</td>
                                    <td id="type_room">
                                        @if ($room->id_type==1)
                                            simple
                                        @elseif ($room->id_type==2)
                                            doble
                                        @elseif ($room->id_type==3)
                                            matrimonial
                                        @else
                                            suit
                                        @endif

                                    </td >
                                    <td id="capacity">{{$room->capacity}} persona/s</td>
                                    <td id="price">{{$room->price}}</td>

                                </tr>
                                @endforeach

                            </tbody>
                    </div>
                </div>
                </table>
                <button type="button" class="btn btn-success" id="btn-actualizar">Cambiar Habitacion</button>
                <button type="button" id="btn-cerrar" class="btn btn-danger">Cerrar</button>

            </dialog>
            </form>
            <!--
            *
            *
            * Final del modal
            *
            *-->
