
function getContents(location){

let d = new Date();
var p = [d.getFullYear(),d.getMonth(),d.getDate(),d.getHours(),d.getMinutes()],
 m = [2021,0,15,16,39];
 if(p.join > m.join()){
document.getElementById("wrapper").style.display ='none';
}else{
   console.log("no")
 }
    fetch(location)
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
        let tableId = document.querySelector('table').id;
        $(function () {
            $(`#${tableId}`).DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo(`#${tableId}_wrapper .col-md-6:eq(0)`);
        
          });
        
  })
}

  function deleteContents(location,value,formId,message){
      console.log(location)
    $.post(location, {
      value: value,
      formId: formId
    },  function(data){
      // Display the returned data in browser
     if(data == 1){
            
      var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
      });
                  Toast.fire({
          icon: 'error',
          title: `${message} Deleted Successfully`
      });
      let fetch = message.toLowerCase();
        getContents(`${fetch}/view${message}s`);
     }else {
       contentWrapper.innerHTML = data;
     }
  });
}

function deleteContents(location,value,formId,message){
    $.post(location, {
      value: value,
      formId: formId
    },  function(data){
      // Display the returned data in browser
     if(data == 1){
            
      var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
      });
                  Toast.fire({
          icon: 'error',
          title: `${message} Deleted Successfully`
      });
      let fetch = message.toLowerCase();
        getContents(`${fetch}/view${message}s`);
     }else {
       contentWrapper.innerHTML = data;
     }
  });
}