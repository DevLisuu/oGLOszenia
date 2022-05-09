function toggleMobileNav() {
    /**
     * Dodaje specjalną klase do headera aby pozwolić na korzystanie z navbara na wąskich urządzeniach
     */
    const header = document.querySelector('header');
    const headerSpecialClass = 'mobile-header';

    if(header.classList.contains(headerSpecialClass)) {
        header.classList.remove(headerSpecialClass);
    }else{
        header.classList.add(headerSpecialClass);
    }


    const nav = document.querySelector('nav');
    const navSpecialClass = 'mobile-nav';

    if(nav.classList.contains(navSpecialClass)) {
        nav.classList.remove(navSpecialClass);
    }else{
        nav.classList.add(navSpecialClass);
    }


    const lougo = document.querySelector('.lougo');
    const lougoSpecialClass = 'mobile-lougo';

    if(lougo.classList.contains(lougoSpecialClass)) {
        lougo.classList.remove(lougoSpecialClass);
    }else{
        lougo.classList.add(lougoSpecialClass);
    }
}