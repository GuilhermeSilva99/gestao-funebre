import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    const toggles = document.querySelectorAll('.dropdown-toggle');

    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const targetId = toggle.getAttribute('data-target');
            const dropdown = document.getElementById(targetId);
            const icon = toggle.querySelector('svg');

            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('dropdownToggle');
    const menu = document.getElementById('dropdownMenu');

    toggle.addEventListener('click', (e) => {
        e.preventDefault();
        menu.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!document.getElementById('dropdown').contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
});
