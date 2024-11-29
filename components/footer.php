 <script src="<?php echo BASE_STATIC; ?>assets/vendors/js/vendor.bundle.base.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/vendors/chart.js/chart.umd.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/vendors/flot/jquery.flot.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/vendors/flot/jquery.flot.resize.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/vendors/flot/jquery.flot.categories.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/vendors/flot/jquery.flot.fillbetween.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/vendors/flot/jquery.flot.stack.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/js/jquery.cookie.js" type="text/javascript?v=<?php echo mt_rand(); ?>"></script>

 <script src="<?php echo BASE_STATIC; ?>assets/js/off-canvas.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/js/misc.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/js/settings.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/js/todolist.js?v=<?php echo mt_rand(); ?>"></script>
 <script src="<?php echo BASE_STATIC; ?>assets/js/hoverable-collapse.js?v=<?php echo mt_rand(); ?>"></script>

 <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
 <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         /** Efecto View Transitions */
         const content = document.querySelector('.main-panel');
         const links = document.querySelectorAll('a.nav-link'); // Solo los enlaces del menú

         links.forEach(link => {
             link.addEventListener('click', function(e) {
                 e.preventDefault();
                 content.classList.add('fade-out');

                 setTimeout(() => {
                     window.location.href = link.href;
                 }, 300);
             });
         });
         content.classList.add('fade-in');
         /* fin del efecto View Transitions */


         let tables = document.querySelectorAll('table');
         if (tables.length == 0) return
         tables.forEach((table) => {
             // Captura el id de la tabla actual
             let tableId = table.id;

             // Inicializa DataTables para cada tabla usando su id
             $(`#${tableId}`).DataTable({
                 pageLength: 10,
                 language: {
                     url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
                 },
             });
         });


         const currentPath = window.location.pathname;
         const baseUrl = "<?php echo BASE_STATIC; ?>";
         const navLinks = document.querySelectorAll('.nav-link');

         navLinks.forEach(link => {
             // Combina el BASE_STATIC con el href del enlace para obtener la URL completa
             const linkPath = new URL(link.getAttribute('href'), baseUrl).pathname;
             // Compara el linkPath con el currentPath
             if (currentPath === linkPath || currentPath === linkPath + '/') {
                 link.classList.add('active'); // Agrega clase al enlace activo
                 link.closest('.nav-item').classList.add('active'); // Agrega clase al contenedor nav-item
             }
         });

     });
 </script>