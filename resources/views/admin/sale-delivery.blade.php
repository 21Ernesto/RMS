<x-admin-layout>
    {{-- <h1 class="font-bold text-2xl">Hotel de: <span class="font-extralight">{{ $trip->name }}</span></h1> --}}

    <div class="mt-7">
        @livewire('sale-delivery', key('sale-delivery'))
    </div>

    <script>
        // Obtener el modal
        var modal = document.getElementById("myModal");

        // Obtener el botón que abre el modal
        var links = document.querySelectorAll(".modal-link");

        // Obtener el elemento <span> que cierra el modal
        var span = document.getElementsByClassName("close")[0];

        // Cuando el usuario haga clic en el enlace, abrir el modal
        links.forEach(function(link) {
            link.addEventListener("click", function() {
                var details = this.getAttribute("data-details");
                document.getElementById("modal-content").innerHTML = details;
                modal.style.display = "block";
            });
        });

        // Cuando el usuario haga clic en <span> (x), cerrar el modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cuando el usuario haga clic en cualquier lugar fuera del modal, cerrarlo
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>


</x-admin-layout>
