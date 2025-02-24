
        

        <!-- Menú desplegable -->
        <div id="menu" class="hidden absolute right-0 mt-2 bg-white shadow-lg rounded-lg w-48">
            <form id="filterForm" method="GET" action="/filtro/resumenVentas">
                @csrf
                <input type="hidden" name="opcion" id="filtroSeleccionado">
                <button type="button" name="opcion" class="block w-full text-left px-4 py-2 hover:bg-gray-200" onclick="seleccionarFiltro('todas')">📋 Todas</button>
                <button type="button" name="opcion" class="block w-full text-left px-4 py-2 hover:bg-gray-200" onclick="seleccionarFiltro('activo')">✅ Realizadas</button>
                <button type="button" name="opcion" class="block w-full text-left px-4 py-2 hover:bg-gray-200" onclick="seleccionarFiltro('cancelado')">❌ Canceladas</button>
            </form>
        </div>
    </div>

    <script>
        // Mostrar / ocultar menú
        document.getElementById("toggleMenu").addEventListener("click", function () {
            document.getElementById("menu").classList.toggle("hidden");
        });

        // Función para seleccionar filtro y enviar formulario automáticamente
        function seleccionarFiltro(valor) {
            document.getElementById("filtroSeleccionado").value = valor;
            document.getElementById("filterForm").submit();
        }

        // Cerrar el menú al hacer clic fuera
        document.addEventListener("click", function (event) {
            const menu = document.getElementById("menu");
            const button = document.getElementById("toggleMenu");
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add("hidden");
            }
        });
    </script>