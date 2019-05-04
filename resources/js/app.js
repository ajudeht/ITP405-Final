window.statusChange = function(e){
  var taskuuid = [...e.target.form.elements].filter(e=>encodeURIComponent(e.name) == "uuid")[0].value;
  var token = [...e.target.form.elements].filter(e=>encodeURIComponent(e.name) == "_token")[0].value;

  var status = e.target.value;

  fetch("/update-task-status", {
     headers: {
       "Content-Type": "application/json",
       "Accept": "application/json, text-plain, */*",
       "X-Requested-With": "XMLHttpRequest",
       "X-CSRF-TOKEN": token
      },
     method: 'post',
     credentials: "same-origin",
     body: JSON.stringify({
       task_uuid : taskuuid,
       status : status,
       _token : token
     })
   }).then((data) => {}).catch((e)=>{ console.log(e) });
   var card = findAncestor(e.target,"task-card");

   animate(card, "swing");
   card.setAttribute("data-status", status)
}

window.submitOnEnter = function(event){
    if(event.which === 13){
        event.target.form.dispatchEvent(new Event("submit", {cancelable: true}));
        event.preventDefault();
    }
}

window.popInit = function(){
  var refs = document.querySelectorAll('.container');
  [...refs].map(e=>{
    var input = e.querySelector('input');
    var bubble = e.querySelector('span');

    var tt = new Tooltip(bubble, {
      placement: 'top',
      title: "Mark Task " + ["Incomplete", "In Progress", "Complete"][input.value],
      container: document.body,
      offset: "-4, 0"
    });
  })

}

window.popInit();

window.animate = function(element, animationName, callback){
  const node = element;
  node.classList.add('animated', animationName)

  function handleAnimationEnd() {
      node.classList.remove('animated', animationName)
      node.removeEventListener('animationend', handleAnimationEnd)

      if (typeof callback === 'function') callback()
  }

  node.addEventListener('animationend', handleAnimationEnd)
}

window.findAncestor = function(el, cls) {
    while ((el = el.parentElement) && !el.classList.contains(cls));
    return el;
}
