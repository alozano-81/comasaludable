
const table = document.getElementById("tabla");
const modal = document.getElementById("nuevoModal");
const inputs = document.querySelectorAll('input');
let count = 0;

table.addEventListener("click", (e) => {
  count = 0;
  //e.stopPropagation();
  //if (e.target.matches("#tabla")) {
  let data = e.target.parentElement.parentElement.children;  
  fillData(data);
  //}
});

const fillData = (data) => {
  console.log(data[0].innerText);
  for(let index of inputs){    
    index.value = data[count].textContent;   
    count += 1;  
  }
  
};