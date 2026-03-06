
const menu = document.getElementById('offcanvasMenu');
const overlay = document.getElementById('offcanvasOverlay');
const toggle = document.getElementById('menuToggle');
const closeBtn = document.getElementById('menuClose');

function openMenu() {
    menu.classList.add('active');
    overlay.classList.add('active');
}

function closeMenu() {
    menu.classList.remove('active');
    overlay.classList.remove('active');
}

toggle.addEventListener('click', openMenu);
closeBtn.addEventListener('click', closeMenu);
overlay.addEventListener('click', closeMenu);

// ESC close
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeMenu();
});
