

contentWrapper.addEventListener('change', function(e) {
    if(e.target.id == 'classTimeTable' || e.target.id == 'studentClass' ) {
  getOption(e.target) 
     }
  
      else if(e.target.id =='optionSelect'){
         getStream(e.target);
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
                 document.querySelector("#stream_name").innerHTML = data;
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