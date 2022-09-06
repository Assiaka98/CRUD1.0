let img_slider =document.getElementsByClassName("img_slider");

let etape = 0;

let nbr_img = img_slider.length;

let precedent = document.querySelector('.precedent');
let suivant = document.querySelector('.suivant');

function desactiveImg(){
    for(let i =0; i<nbr_img; i++)
    {
        img_slider[i].classList.remove('active'); 
    }
}

suivant.addEventListener('click', function(){
    etape++;
    if(etape >=nbr_img)
    {
        etape=0; 
    }
    desactiveImg();
    img_slider[etape].classList.add('active');
})

precedent.addEventListener('click', function(){
    etape--;
    if(etape <0)
    {
        etape= nbr_img -1;
    }
    desactiveImg();
    img_slider[etape].classList.add('active');
})

setInterval(function(){
    etape++;
    if(etape >=nbr_img)
    {
        etape=0; 
    }
    desactiveImg();
    img_slider[etape].classList.add('active');
},2000)



const back = document.querySelector('.back');
const next = document.querySelector('.next');
back.disabled = true;

const footer_slide=()=>{
    const img_f = document.querySelectorAll('.img_f');
    const img_f10 = document.querySelectorAll('.img_f10');
    for(let i =0; i<img_f.length; i++)
    {
        const slide1 = img_f[i];
        const slide2 = img_f10[i];
        if(slide1.display == 'block')
        {
            slide1.style.display = 'none';
            slide2.style.display = 'block';
            next.disabled = true;
            back.disabled = false;
        }
        else
        {
            slide1.style.display = 'block';
            slide2.style.display = 'none';
            next.disabled = false;
            back.disabled = true;
        }
    }   
}