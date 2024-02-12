const liItem = document.querySelectorAll('ul li');
  const cat = document.querySelectorAll('.Head');
  
  

  liItem.forEach(li =>  {
    li.onclick =function(){
      //active
    liItem.forEach(li =>  {
        li.className = "";
    })
    li.className="active";
    
    //filter
    const value =li.textContent;

    cat.forEach(p =>{
      p.style.display = 'none';
      if (p.getAttribute('data-filter')==value.toLocaleLowerCase() || value == "Control Panel"){
        p.style.display = 'block';
        
      }
    })
  }
});
