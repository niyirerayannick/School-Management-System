contentWrapper.addEventListener('change', function(e) {
    if(e.target.id == 'classTimeTable' || e.target.id == 'studentClass' ) {
  getOption(e.target) 
     }
  
      else if(e.target.id =='optionSelect'){
   getStream(e.target);
      }
     else if(e.target.id == 'selectClassFees'){
       getFeesTable(e.target);
     }
     else if(e.target.id == 'selectClassAttendance'){
       //getAttandanceTable(e.target);
     }
     else if(e.target.id == 'className'){
       if(e.target.value == 's4' || e.target.value == 's5' || e.target.value == 's6'
       || e.target.value == 'S4'||e.target.value == 'S5'||e.target.value == 'S6'){
         document.querySelector("#optionDiv").style.display = 'block';
       }else{
         document.querySelector("#optionDiv").style.display = 'none';
 
       }
     }
     else if(e.target.id == 'classNameUpdate'){
       getOption(e.target);
     }
     else if(e.target.id =='classNameTimeTable'){
      getOptionTimeTable(e.target);
         }
 });


 function getOption(target){
  //console.log(target)
    let option = target.childNodes;
    for (let index = 3; index < option.length-1; index++) {
       if(option[index].value == target.value){
            let val = option[index].innerHTML;
            if (val == 's4' || val == 's5' || val == 's6') {
              document.querySelector("#optionDiv").style.display = 'block';
              $.post("helpers.php",{
                  class_id: target.value,
                  formId:'getOption'
              }
                   , function(data){
                 // Display the returned data in browser
                if(data == 1){
                       
                
                 //  handle errors from the server
                }else {
                 document.querySelector("#optionSelect").innerHTML = data;
                 document.querySelector("#streamDiv").style.display = 'none';
                }
             });
            }else{
              document.querySelector("#optionDiv").style.display = 'none';
              document.querySelector("#streamDiv").style.display = 'block';
              $.post("helpers.php",{
                  class_id: target.value,
                  formId:'getStream'
              }
                   , function(data){
                 // Display the returned data in browser
                if(data == 1){
                       
                
                 //  handle errors from the server
                }
                
                  else {
                 document.querySelector("#streamSelect").innerHTML = data;
                }
             });
            }
       }
      
    }
 }

 function getOptionTimeTable(target){
  //console.log(target)
    let option = target.childNodes;
    for (let index = 3; index < option.length-1; index++) {
       if(option[index].value == target.value){
            let val = option[index].innerHTML;
            if (val == 's4' || val == 's5' || val == 's6') {
              document.querySelector("#optionDiv").style.display = 'block';
              $.post("helpers.php",{
                  class_id: target.value,
                  formId:'getOption'
              }
                   , function(data){
                 // Display the returned data in browser
                if(data == 1){
                       
                
                 //  handle errors from the server
                }else {
                 document.querySelector("#optionSelect").innerHTML = data;
                 document.querySelector("#streamDiv").style.display = 'none';
                }
             });
            }else{
              document.querySelector("#optionDiv").style.display = 'none';
              document.querySelector("#streamDiv").style.display = 'block';
              $.post("helpers.php",{
                  class_id: target.value,
                  formId:'getStream'
              }
                   , function(data){
                     console.log(data);
                 // Display the returned data in browser
                if(data == 1){
                       
                
                 //  handle errors from the server
                }
                else if(data == 0){
                  document.querySelector("#streamDiv").style.display = 'none';
              }
                else {
                 document.querySelector("#streamSelect").innerHTML = data;
                }
             });
            }
       }
      
    }
 }


 function getFeesTable(target){

              $.post("helpers.php",{
                  class_id: target.value,
                  formId:'getFeesTable'
              }
                   , function(data){
                 //    console.log(data);
                 // Display the returned data in browser
                if(data == 1){
                       
                
                 //  handle errors from the server
                }else {
                //document.querySelector("#viewFeesTable").innerHTML = data;
                document.querySelector("#viewAttandanceTable").innerHTML = data;
                document.querySelector("#big").className = 'col-md-6';
                document.querySelector("#small").className = 'col-md-6';

                //hide the un and checkall button when the current column is big
                document.querySelector("#checkAll").style.display = 'none';
                document.querySelector("#unCheckAll").style.display = 'none';
                }
             });
 }

 function getAttandanceTable(){
  $('#getClassAttandance').submit(function(e)
  {
   e.preventDefault();
      let formData = $(this).serialize();
      $.post("helpers.php", formData , function(data)
       {
             //    console.log(data);
           // Display the returned data in browser
         if(data == 1){
           
    
          //  handle errors from the server
          }else {
          document.querySelector("#viewFeesTable").innerHTML = data;
          //Show the Check all and un check all buttons
          document.querySelector("#checkAll").style.display = 'block';
          document.querySelector("#unCheckAll").style.display = 'block';
          document.querySelector("#makeAttendanceTable").style.display = 'block';


         //make the current column the big one 
         document.querySelector("#big").className = 'col-md-8';
         document.querySelector("#small").className = 'col-md-4';
       }
      });
    })
  }

  function makeAttendanceTable(){
    $('#makeAttandance').submit(function(e)
    {
     e.preventDefault();
        let formData = $(this).serialize();
        $.post("helpers.php", formData , function(data)
         {
               //    console.log(data);
             // Display the returned data in browser
           if(data == 1){
            //  handle errors from the server
            }else {
           document.querySelector("#viewFeesTable").innerHTML = '';
           var Toast = Swal.mixin({
            toast: true,
             position: 'top',
            showConfirmButton: false,
            timer: 3000
              });
                    Toast.fire({
            icon: 'success',
            title: 'New Class Attendance Record made successfully'
                     });
                              //make the current column the big one 
          document.querySelector("#big").className = 'col-md-6';
          document.querySelector("#small").className = 'col-md-6';
             }  
        });
      })
    }

  function disableCheckbox(checkbox){
        if(checkbox.value == '1'){
          let dangerBox = document.querySelectorAll("input[value ='0']");
            if(checkbox.id == '-1000000'){
             document.getElementById("1000").checked= false;
              }else{
                 dangerBox.forEach(box =>{
                 if(-(box.id - 1000 )/ 1000 == parseInt(checkbox.id)){
                    box.checked =false;
                  }
                })
              }
         }
        else  if(checkbox.value == '0'){
            let succesBox = document.querySelectorAll("input[value ='1']");
              if(checkbox.id == '1000'){
                document.getElementById('-1000000').checked = false;
              }else{
                succesBox.forEach(box =>{
                  if(parseInt(box.id) == -(checkbox.id - 1000 )/ 1000){
                     box.checked =false;
                  }
                })
              }
      }
    }
/*
 function getStream(target){
  console.log(target)
    let option = target.childNodes;
    for (let index = 3; index < option.length-1; index++) {
       if(option[index].value == target.value){
            let val = option[index].innerHTML;
            if (val == 's1' || val == 's2' || val == 's3') {
              $.post("helpers.php",{
                  class_id: target.value,
                  formId:'getStream'
              }
                   , function(data){
                 // Display the returned data in browser
                if(data == 1){
                       
                
                 //  handle errors from the server
                }else {
                 document.querySelector("#streamSelect").innerHTML = data;
                }
             });
            }else{
              document.querySelector("#optionDiv").style.display = 'none';
    
            }
       }
      
    }
 }*/

 document.addEventListener("load",document.querySelector("#loading").style.display = 'block');
