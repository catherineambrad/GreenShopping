const notices = document.querySelector(".woocommerce-notices-wrapper");

if (notices) {
    setTimeout(() => {
        notices.classList.add("noactive");
    }, 5000);
}