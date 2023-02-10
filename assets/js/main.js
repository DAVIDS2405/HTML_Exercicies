const main_img = document.querySelector('.Image.Change')
const thumbnails = document.querySelectorAll('.Change')
const name_imd = document.querySelector('.Name')

thumbnails.forEach(thumb =>{
    thumb.addEventListener('click', function(){
        const active = document.querySelector('.Active')
        active.classList.remove('Active')
        thumb.classList.add('Active')
        main_img.src = this.src
        name_imd.textContent = thumb.alt     
        
    })
    
})






