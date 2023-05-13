const headerSilde = () =>{
    const burger = document.querySelector('.burger');
    const header = document.querySelector('.list-menu');
    const headerLinks = document.querySelectorAll('.list-menu li')
    burger.addEventListener('click', () =>{

       header.classList.toggle('header-active');

        headerLinks.forEach((link, index)=>{
            if(link.style.animation){
                link.style.animation='';
            }else{
            link.style.animation = `navLinkFade 0.5s ease forwards ${index/ 7+0.05 }s`;
            }
        });
        burger.classList.toggle('toggle');
    });
}
headerSilde();