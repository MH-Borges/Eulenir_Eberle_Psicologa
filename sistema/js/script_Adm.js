function toggleForm(){
  sidebar = document.querySelector('.Sidebar');
  toggleBT = document.querySelector('.menuSide');
  block = document.querySelector('.Box_conteudo');
  sidebar.classList.toggle('active');
  toggleBT.classList.toggle('active');
  block.classList.toggle('active');
}

function ArrowComment(){
  block = document.querySelector('.comentsIdx');
  arrrow = document.querySelector('.ArrowComment');
  block.classList.toggle('active');
  arrrow.classList.toggle('active');
}