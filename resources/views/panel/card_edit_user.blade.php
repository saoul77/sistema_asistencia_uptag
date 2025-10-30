<link href="{{ asset('css/card_edit_user.css') }}" rel="stylesheet">



<div class="edit_user_card hide" id="edit_user_card">
    <div class="close-icon" id="hide_card_create_user"></div>
    <form action="{{ route('personal.create') }}" method="POST" id="edit_user_form" class="flex flex-col gap-4">
        @csrf
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="">
        <input type="email" name="correo" id="correo" placeholder="Correo" value="">
        <select name="cargo" id="cargo">
            <option value="Docente" >Docente</option>
            <option value="Asistente Técnico">Asistente Técnico</option>
        </select>
        <!-- <input type="text" name="asistencia" id="asistencia" placeholder="Asistencia" value=""> -->
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar Cambios</button>
    </form>

</div>
<script>

    var card_container = document.querySelector('#edit_user_card');
    var add_personal_buttons = document.querySelectorAll('#hide_card_create_user');
    add_personal_buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            card_container.classList.toggle('hide');
           
        });
    });

</script>