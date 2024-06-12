document.addEventListener("DOMContentLoaded", function() {
    // Hide all submenus initially
    var submenus = document.querySelectorAll('.submenu ul');
    submenus.forEach(function(submenu) {
        submenu.style.display = 'none';
    });

    // Toggle submenu when clicking on menu arrow
    var submenuLinks = document.querySelectorAll('.submenu > a');
    submenuLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            var submenu = this.nextElementSibling;
            if (submenu.style.display === 'none') {
                submenu.style.display = 'block';
            } else {
                submenu.style.display = 'none';
            }
            event.preventDefault();
        });
    });
});
document.addEventListener("DOMContentLoaded", function() {
    var fullscreenImg = document.getElementById('fullscreen-img');
    fullscreenImg.addEventListener('click', function() {
        if (!document.fullscreenElement) {
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.webkitRequestFullscreen) { /* Safari */
                document.documentElement.webkitRequestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) { /* IE11 */
                document.documentElement.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE11 */
                document.msExitFullscreen();
            }
        }
    });
});


(function() {
    var toggleBtn = document.getElementById('toggle_btn');
    var body = document.body;
    var subMenus = document.querySelectorAll('.subdrop + ul');

    toggleBtn.addEventListener('click', function() {
        if (body.classList.contains('mini-sidebar')) {
            body.classList.remove('mini-sidebar');
            subMenus.forEach(function(menu) {
                menu.style.display = 'block';
            });
        } else {
            body.classList.add('mini-sidebar');
            subMenus.forEach(function(menu) {
                menu.style.display = 'none';
            });
        }
        setTimeout(function() {
            // Any additional actions after toggling
        }, 300);
        return false;
    });

    document.addEventListener('mouseover', function(e) {
        e.stopPropagation();
        if (body.classList.contains('mini-sidebar') && toggleBtn.offsetParent !== null) {
            var target = e.target.closest('.sidebar');
            if (target) {
                body.classList.add('expand-menu');
                subMenus.forEach(function(menu) {
                    menu.style.display = 'block';
                });
            } else {
                body.classList.remove('expand-menu');
                subMenus.forEach(function(menu) {
                    menu.style.display = 'none';
                });
            }
            return false;
        }
    });
})();


$(document).ready(function() {
    if ($('.datetimepicker').length > 0) {
        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY',
            icons: {
                up: "fas fa-angle-up",
                down: "fas fa-angle-down",
                next: 'fas fa-angle-right',
                previous: 'fas fa-angle-left'
            }
        });

        $('.datetimepicker').on('dp.show', function() {
            $(this).closest('.table-responsive').removeClass('table-responsive').addClass('temp');
        }).on('dp.hide', function() {
            $(this).closest('.temp').addClass('table-responsive').removeClass('temp');
        });
    }
});


  // Select 2

  if ($('.select').length > 0) {
    $('.select').select2({
        minimumResultsForSearch: -1,
        width: '100%'
    });
}