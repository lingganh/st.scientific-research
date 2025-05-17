const themeSwitch = document.getElementById('themeSwitch');
const body = document.body;
const headerSection = document.querySelector('.header-section'); // Ví dụ một phần tử header
const logo = document.querySelector('.logo'); // Ví dụ phần tử logo

// Hàm để thiết lập theme dựa trên local storage hoặc mặc định
function setTheme(theme) {
    if (theme === 'dark') {
        body.classList.add('dark-theme');
        headerSection.classList.add('dark-theme');
        logo.classList.add('dark-theme');
        themeSwitch.checked = true;
    } else {
        body.classList.remove('dark-theme');
        headerSection.classList.remove('dark-theme');
        logo.classList.remove('dark-theme');
        themeSwitch.checked = false;
    }
    localStorage.setItem('theme', theme);
}

// Lấy theme từ local storage khi tải trang
const currentTheme = localStorage.getItem('theme');
if (currentTheme) {
    setTheme(currentTheme);
} else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
    setTheme('dark'); // Thiết lập theme tối nếu hệ thống đang ở chế độ tối
} else {
    setTheme('light'); // Thiết lập theme sáng mặc định
}

// Lắng nghe sự kiện thay đổi của checkbox
themeSwitch.addEventListener('change', () => {
    if (themeSwitch.checked) {
        setTheme('dark');
    } else {
        setTheme('light');
    }
});