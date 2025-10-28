@section('title', 'Panel de user')
@section('content')
    <div class="edit_user_card" style="display: block;">

        <form action="" method="post" id="edit_user_form" class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" value="">
            <input type="email" name="Correo" id="Correo" placeholder="Correo" value="">
            <select name="Cargo" id="Cargo">
                <option value="Docente" >Docente</option>
                <option value="Asistente Técnico" >Asistente Técnico</option>
            </select>
            <input type="text" name="Asistencia" id="Asistencia" placeholder="Asistencia" value="">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar Cambios</button>
        </form>


        <script>

            var form = document.getElementById('edit_user_form');
            var add_personal_button = document.getElementById('add_personal_button');
            add_personal_button.addEventListener('click', function() {
                form.style.display = 'block';
                console.log("clicked");

            });


        </script>

    </div>
@endsection
