const slider = document.querySelector('.slider');
M.Slider.init(slider ,{
    indicators :false ,
    height :500 ,
    transistion :500 ,
    interval :6000 
}); 
var btn = document.getElementById('btn') ;
var msgForm = document.getElementById('msgForm') ; 
btn.addEventListener('clcik' , onClick ) ; 
function onClick ()
{
    msgForm.classList.add('msgForm');
    const createForm = document.createElement('form') ; 
}