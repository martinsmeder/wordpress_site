document.addEventListener('DOMContentLoaded', () => {
    const menuIcon = document.querySelector('.menu-icon');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Paths to the icons
    const hamburgerIcon = `${menuIcon.src}`;
    const crossIcon = `${menuIcon.src.replace('hamburger-menu.png', 'cross.png')}`;

    // Toggle the dropdown menu visibility and icon
    menuIcon.addEventListener('click', () => {
        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
            menuIcon.src = hamburgerIcon;
        } else {
            dropdownMenu.style.display = 'block';
            menuIcon.src = crossIcon;
        }
    });

    // Close the dropdown and revert the icon when clicking outside
    document.addEventListener('click', (event) => {
        if (!menuIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
            menuIcon.src = hamburgerIcon;
        }
    });
});