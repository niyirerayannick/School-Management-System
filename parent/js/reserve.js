contentWrapper.addEventListener('change', function(e) {
    if(e.target.id == 'classTimeTable' || e.target.id == 'studentClass' ) {
 
   let option = e.target.childNodes;
   for (let index = 3; index < option.length-1; index++) {
      if(option[index].value == e.target.value){
           let val = option[index].innerHTML;
           if (val == 's4' || val == 's5' || val == 's6') {
             document.querySelector("#optionDiv").style.display = 'block';
             $.post("class/class-dm.php",{
                 class_id: e.target.value,
                 formId:'getOption'
             }
                  , function(data){
                // Display the returned data in browser
               if(data == 1){
                      
                var Toast = Swal.mixin({
                  toast: true,
                  position: 'top',
                  showConfirmButton: false,
                  timer: 3000
                });
                            Toast.fire({
                    icon: 'success',
                    title: 'New Student Added Successfully'
                });
                  viewAllStudents();
               }else {
                 contentWrapper.innerHTML = data;
               }
            });
           }else{
             document.querySelector("#optionDiv").style.display = 'none';
 
           }
      }
     
   }
 
     }
 
     else if(e.target.id == 'className'){
       if(e.target.value == 's4' || e.target.value == 's5' || e.target.value == 's6'
       || e.target.value == 'S4'||e.target.value == 'S5'||e.target.value == 'S6'){
         document.querySelector("#optionDiv").style.display = 'block';
       }else{
         document.querySelector("#optionDiv").style.display = 'none';
 
       }
     }
 });