function statusChange(e){
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

    }
