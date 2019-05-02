function statusChange(e){
  var taskuuid = [...e.target.form.elements].filter(e=>encodeURIComponent(e.name) == "uuid")[0].value;
  var token = [...e.target.form.elements].filter(e=>encodeURIComponent(e.name) == "_token")[0].value;
  var stat = e.target.value;
  var formData = {
    task_uuid : taskuuid,
    status : status,
    _token : token
  }

  fetch('/update-task-status', {
    credentials: 'include', //pass cookies, for authentication
    method: 'post',
    headers: {
    'Accept': 'application/json, application/xml, text/plain, text/html, *.*',
    'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
    },
    body: Object.keys(formData).map(function(k) {
    return encodeURIComponent(k) + '=' + encodeURIComponent(formData[k])
}).join('&'),
  }).then(res => res.json())
  .then(response => console.log('Success:', JSON.stringify(response)))
  .catch(error => console.error('Error:', error));
}
