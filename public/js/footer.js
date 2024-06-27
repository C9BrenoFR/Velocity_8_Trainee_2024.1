function revelar(id1, id2, id3, id4){
  const manter=document.querySelector(id1);
  manter.classList.remove('disable');
  const sumir=document.querySelector(id2);
  sumir.classList.add('disable');
  const sumir1=document.querySelector(id3);
  sumir1.classList.add('disable');
  const sumir2=document.querySelector(id4);
  sumir2.classList.add('disable');
}