// header section 
const searchBar =  document.querySelector(".search-box");
const body = document.querySelector("body");

searchBar.onclick = ()  =>{
    searchBar.classList.toggle("active");
}


// user btn 

const userBtn =  document.querySelector(".user-account");
const sideBar =  document.querySelector(".side-bar");
const themeSwitcher =  document.querySelector(".theme-changer");
const apperance =  document.querySelector(".apperance");
const btnSm =  document.querySelector(".btn-sm");

userBtn.onclick = () =>{
        sideBar.classList.toggle('show');
    
}

themeSwitcher.onclick = () =>{
    apperance.classList.add("show")
    sideBar.classList.remove('show');
}

btnSm.onclick = () =>{
    apperance.classList.remove("show")
    sideBar.classList.add('show');
}

// dark and light mode system

const darkBtn = document.querySelector(".darkBtn");
darkBtn.onclick = () =>{
   document.querySelector('body').classList.add('dark');
}


// overllay close start 

const closeOverlay  = document.querySelector(".closeOverlay");
const overLay  = document.querySelector(".upload-main");
const openOverlay  = document.querySelector(".openOverlay");

closeOverlay.onclick = () =>{
    overLay.classList.remove("show");
}

openOverlay.onclick = () =>{
    overLay.classList.add("show");
}
