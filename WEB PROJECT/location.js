
let pre=document.querySelector('.pre');
let next=document.querySelector('.next');
let title=document.querySelector('.title');
let slider=document.querySelectorAll('.slider img');
let imgs=
['images/ethlib1.jpg',
'images/ethlib2.jpg',
'images/ethlib3.jpg',
'images/ghanalib1.jpg'];
slider[0].style.opacity=0.2;

let current=0;
title.style.backgroundImage=`url(${imgs[current]})`;
let imgLength=imgs.length -1

pre.addEventListener('click',function(){
    current--
    current<0?current=imgLength:''
    title.style.backgroundImage=`url(${imgs[current]})`;
    clearInterval(timer)
})
next.addEventListener('click',function(){
current++
current>imgLength?current=0:''
title.style.backgroundImage=`url(${imgs[current]})`;
clearInterval(timer)
//console.log(current)
})
//change image when clicked image and add timer to change image every 3 secs and when the prev or next button are clicked stop the timer and let user take control
slider[0].addEventListener('click',function(){
    title.style.backgroundImage=`url(${imgs[0]})`
})
slider[1].addEventListener('click',function(){
    title.style.backgroundImage=`url(${imgs[1]})`
})
slider[2].addEventListener('click',function(){
    title.style.backgroundImage=`url(${imgs[2]})`
})
slider[3].addEventListener('click',function(){
    title.style.backgroundImage=`url(${imgs[3]})`
})

let timer=setInterval(()=>
{
    current++
current>imgLength?current=0:''
title.style.backgroundImage=`url(${imgs[current]})`;


},3000);



