
//defining function for handling events
//student handling methods
function getAddStudent(){
  fetch("students/addStudent.php")
  .then(response =>  response.text())
  .then(html => {
      //contentWrapper.innerHTML = html
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))

        //Initialize Select2 Elements
        $('.select2').select2()
    
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
})
}

function updateStudent(value,studentId){
 
      $.post("students/student-dm.php", {
        value: value,
        formId: studentId
      }, function(data){
        contentWrapper.innerHTML = data;
      })
        //Initialize Select2 Elements
        $('.select2').select2()
    
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
      }

function deleteStudent(value,studentId){
      $.post("students/student-dm.php", {
        value: value,
        formId: studentId
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
            title: 'Student Deleted Successfully'
        });
          viewAllStudents();
       }else {
         contentWrapper.innerHTML = data;
       }
    });
}


function addNewStudent(){
  $( '#form' )
  .submit( function( e ) {
    $.ajax( {
      url: 'students/student-dm.php',
      type: 'POST',
      data: new FormData( this ),
      processData: false,
      contentType: false,
      success:function(data){
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
        }
        else{
      console.log(data);
        }
      },
      error: function(r) {
      console.log(r);
      }
    } );
    e.preventDefault();
  } );

  }


function viewAllStudents(){
    fetch("students/viewStudents.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
 })
  }
  
function  viewHighperformingStudents(){
  fetch("students/viewHighPerformingStudents.php")
  .then(response =>  response.text())
  .then(html => {
      //contentWrapper.innerHTML = html
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
})
}

    function mergeSubjects(arr){
    let subjects = [];
    for(let i =0 ; i < arr.length ; i++){
       subjects.push(arr[i][0])
     }

     subjects = [...new Set(subjects)];

      return subjects;
    }

          function spreadArray(arr,spreadValue){
          let res1 = arr;
               var result = res1.filter(function(v,i) {
                   return v[0][0] === spreadValue;
                    });
               result.forEach(e => {
                    e.shift();
                    });
               result = [].concat(...result);

            return result;
           }
           const colors = ['#007bff', '#8e44ad', '#5421b9', '#e67e22', '#2ecc71','#eb3d0d','#343a40']


function viewStudentDetails(value,studentId){
  $.post("students/student-dm.php", {
    value: value,
    formId: studentId
  },  function(data){
    // Display the returned data in browser
   if(data == 1){
  //viewAllStudents();
   }else {
     contentWrapper.innerHTML = data;
     let doc = document.querySelector('#myChart');

     let  labels = JSON.parse(document.querySelector('#spanLabel').innerHTML);
     let  mainData = JSON.parse(document.querySelector('#spanData').innerHTML);
     let  d = JSON.parse(document.querySelector('#checking').innerHTML);   
     let legendText = JSON.parse(document.querySelector("#subjects").innerHTML);
     let res = mergeSubjects(d)
     let j;
     let dataset =[]
     for(j = 0; j < res.length ;j++){

      let attendance = spreadArray(d,res[j]);
      //get the dates for the subjects studied
      let  dates = attendance.filter((v,i) => i % 2 !== 0)
      //get the number of times the subject were studied at a certain date
        attendance = attendance.filter((v,i) => i % 2 == 0)
        //loop through the label property to put zero where the student didn't attend
            for(let i = 0; i < labels.length ; i++){
                if(!dates.includes(labels[i])){
                  attendance.splice(i, 0, "0");                }
            }
            let obj = {
              type: 'line',
              label:legendText[j],
              data: attendance,
              backgroundColor: 'transparent',
              borderColor: colors[j],
              pointBorderColor: colors[j],
              pointBackgroundColor: colors[j],
              fill: false
              // pointHoverBackgroundColor: '#007bff',
              // pointHoverBorderColor    : '#007bff'
            }
            dataset.push(obj);
    }
/*
     for(j = 0; j < res.length ;j++){
      
     }
*/
     document.getElementById("studentAttendance").innerHTML = doc.innerHTML;

     //console.log(mainData)

     contentWrapper.innerHTML = data;
     $(function () {
       
       var ticksStyle = {
         fontColor: '#495057',
         fontStyle: 'bold'
       }
     
       var mode = 'index'
       var intersect = false
 
       var $visitorsChart = $('#visitors-chart')
       // eslint-disable-next-line no-unused-vars
       var visitorsChart = new Chart($visitorsChart, {
         data: {
           labels: labels,
           datasets: dataset
         },
         options: {
           maintainAspectRatio: false,
           tooltips: {
             mode: mode,
             intersect: intersect
           },
           hover: {
             mode: mode,
             intersect: intersect
           },
           legend: {
             display: true,
             legendText : ["Algorithm &amp; Programming II", "Economics", "Operating System", "Mathematics"]
           },
           scales: {
             yAxes: [{
               // display: false,
               gridLines: {
                 display: true,
                 lineWidth: '4px',
                 color: 'rgba(0, 0, 0, .2)',
                 zeroLineColor: 'transparent'
               },
               ticks: $.extend({
                 beginAtZero: false,
                 suggestedMax: 8,
                 suggestedMin: -1

               }, ticksStyle)
             }],
             xAxes: [{
               display: true,
               gridLines: {
                 display: true,
                 
               },
               ticks: ticksStyle
             }]
           }
         }
       })      
     
 })
   
   }
});
}


//teachers handling methods
  function viewAllTeachers(){
    getContents("teachers/viewTeachers.php");
  }
  "teachers/viewTeachers.php"
function getAddNewTeacher(){
  getContents("teachers/addTeacher.php");

  }


  function addNewTeacher(){
    $("form").submit(function(event){
     // Stop form from submitting normally
     event.preventDefault();
     
     /* Serialize the submitted form control values to be sent to the web server with the request */
     let formValues = $(this).serialize();
     // Send the form data using post
     $.post("teachers/teacher-dm.php", formValues, function(data){
         // Display the returned data in browser
         //console.log(formValues);
        console.log(data)
        if(data == 1111){
               
         var Toast = Swal.mixin({
           toast: true,
           position: 'top',
           showConfirmButton: false,
           timer: 3000
         });
                     Toast.fire({
             icon: 'success',
             title: 'Teacher Added Successfully'
         });
           viewAllTeachers();
        }
     });
 });
}

//classes handling methods



function getAddClass(){
   getContents("class/addClass.php");
         //Initialize Select2 Elements
         $('.select2').select2()
    
         //Initialize Select2 Elements
         $('.select2bs4').select2({
           theme: 'bootstrap4'
         })
  }


  function addNewClass(){
         $("form").submit(function(event){
          // Stop form from submitting normally
          event.preventDefault();
          
          /* Serialize the submitted form control values to be sent to the web server with the request */
          let formValues = $(this).serialize();
          // Send the form data using post
          $.post("class/class-dm.php", formValues, function(data){
              // Display the returned data in browser
              //console.log(formValues);
              contentWrapper.innerHTML = data;

             if(data == 1){
                    
              var Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000
              });
                          Toast.fire({
                  icon: 'success',
                  title: 'Class Added Successfully'
              });

                viewAllClasses();
             }
          });
      });
  }

  function viewClassStream(){
 getContents("class/viewStreams.php");
  }

  function selectUpdateClass(value,classId){

        $.post("class/class-dm.php", {
          value: value,
          formId: classId
        },
        function(data){
          contentWrapper.innerHTML = data;
        })
          //Initialize Select2 Elements
          $('.select2').select2()
      
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          })
        }

 function addOption(){
    $('form').submit(function(e){
      e.preventDefault();
        let formData = $(this).serialize();
        $.post('class/class-dm.php',formData, data => {
          var Toast = Swal.mixin({
            toast: true,
             position: 'top',
            showConfirmButton: false,
            timer: 3000
              });
                    Toast.fire({
            icon: 'success',
            title: 'Option Added Successfully'
                });
            viewClassStream()      
          })
      })
 }

  function updateClass(){
    $("form").submit(function(event){
      // Stop form from submitting normally
      event.preventDefault();
      
      /* Serialize the submitted form control values to be sent to the web server with the request */
      let formValues = $(this).serialize();
      // Send the form data using post
        //let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        $.post("class/class-dm.php",formValues,function(data){
  /* Display the returned data in browser */  
       if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'top',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'success',
        title: 'Class Updated Successfully'
    });
      viewAllClasses();
   }        })
         
  })
  }
  
  
  function deleteClass(value,classId){
    $.post("class/class-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
      contentWrapper.innerHTML = data;

      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'top',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'error',
        title: 'Class Deleted Successfully'
                 });
      viewAllClasses();
         }   
        })
    }

function getClassAttendanceForm(){
  fetch('class/getClassAttendance.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');

     
      contentWrapper.innerHTML = doc.innerHTML;
     
  })
}

function viewAllClasses(){
  fetch('class/viewClasses.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
     contentWrapper.innerHTML = doc.innerHTML;

   $(function () {
    $("#viewClassesTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#viewClassesTable_wrapper .col-md-6:eq(0)');

  });

})
      
  }

function getClassAttendance(){
  $('#form').submit(function(e){
    e.preventDefault();
     let formData = $(this).serialize();
     console.log(formData);
    $.post("class_attendance.php",formData,  function(data){
      // Display the returned data in browser
     if(data == 1){
            document.getElementById("empty").style.display = 'block';
     }else {

      let doc = document.querySelector('#myChart');
      document.querySelector("#classAttendanceChart").innerHTML = data;

      let  labels = JSON.parse(document.querySelector('#spanLabel').innerHTML);
      let  mainData = JSON.parse(document.querySelector('#spanData').innerHTML);
      let legendText = document.querySelector('#legendText').innerHTML;
      console.log(legendText);
      $(function () {
        var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
        }
        var mode = 'index'
        var intersect = false

        var $visitorsChart = $('#visitors-chart')
        // eslint-disable-next-line no-unused-vars
        var $visitorsChart = $('#visitors-chart')
        // eslint-disable-next-line no-unused-vars
        var visitorsChart = new Chart($visitorsChart, {
          data: {
            labels: labels,
            datasets: [{
              type: 'line',
              data: mainData,
              backgroundColor: 'transparent',
              borderColor: '#007bff',
              pointBorderColor: '#007bff',
              pointBackgroundColor: '#007bff',
              fill: false,
              pointHoverBackgroundColor: '#007bff',
              // pointHoverBorderColor    : '#007bff'
            }]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            legend: {
              display: false,
            },
            scales: {
              yAxes: [{
                // display: false,
                gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                  beginAtZero: false,
                  suggestedMax: 8,
                  suggestedMin: -1
 
                }, ticksStyle)
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display: true,
                  
                },
                ticks: ticksStyle
              }]
            }
          }
        })  
      })
      //  ---$(function () 
    }
    });
  });
 }


function getStudentAttendance(){
  fetch('students/student_attendance.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#myChart');
      let doc2 = (parser.parseFromString(html, 'text/html')).querySelector('#labels');
      let doc3 = (parser.parseFromString(html, 'text/html')).querySelector('#data');
     
      document.getElementById("studentAttendance").innerHTML = doc.innerHTML;
     //console.log(doc2.childNodes)
      let labels = [];
      let mainData = [];
      for(index = 1 ; index < doc2.childNodes.length - 1; index++){

        if(doc2.childNodes[index].className == 'number_of_attendance'){
           mainData.push(doc2.childNodes[index].innerHTML);
             }
        else{
          labels.push(doc2.childNodes[index].innerHTML);
        }
      }
         // console.log(mainData)
        //  console.log(labels)


      $(function () {
      
        var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
        }
      
        var mode = 'index'
        var intersect = false

        var $visitorsChart = $('#visitors-chart')
        // eslint-disable-next-line no-unused-vars
        var visitorsChart = new Chart($visitorsChart, {
          data: {
            labels: labels,
            datasets: [{
              type: 'line',
              data: mainData,
              backgroundColor: 'transparent',
              borderColor: '#007bff',
              pointBorderColor: '#007bff',
              pointBackgroundColor: '#007bff',
              fill: false,
              pointHoverBackgroundColor: '#007bff',
              // pointHoverBorderColor    : '#007bff'
            }]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                // display: false,
                gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                  beginAtZero: true,
                  suggestedMax: 8
                }, ticksStyle)
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display: true,
                  
                },
                ticks: ticksStyle
              }]
            }
          }
        })      
      
  })
   
  })
}


//get list of Hostels
function viewAllHostels(){
  fetch('hostels/viewHostels.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
      //initials datatables
      $(function () {
        $("#viewHostelTable").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#viewHostelTable_wrapper .col-md-6:eq(0)');
    
      });
  })
}

function getAddHostel(){
  fetch('hostels/addNewHostel.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function addHostel(){
  $("form").submit(function(event){
   // Stop form from submitting normally
   event.preventDefault();
   
   /* Serialize the submitted form control values to be sent to the web server with the request */
   let formValues = $(this).serialize();
   // Send the form data using post
   $.post("hostels/hostel-dm.php", formValues, function(data){
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
        title: 'Hostel Added Successfully'
                 });
         viewAllHostels();
         }  

   });
});
}

function deleteHostel(value,classId){
  $.post("hostels/hostel-dm.php", {
    value: value,
    formId: classId
  },
  function(data){
    contentWrapper.innerHTML = data;

    if(data == 1){
                  
      var Toast = Swal.mixin({
      toast: true,
       position: 'top',
      showConfirmButton: false,
      timer: 3000
        });
              Toast.fire({
      icon: 'error',
      title: 'Hostel Deleted Successfully'
               });
       viewAllHostels();
       }   
      })
}

function selectUpdateHostel(value,classId){

  $.post("hostels/hostel-dm.php", {
    value: value,
    formId: classId
  },
  function(data){
    contentWrapper.innerHTML = data;
  })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  }

function updateHostel(){
$("form").submit(function(event){ 
// Stop form from submitting normally
event.preventDefault();

/* Serialize the submitted form control values to be sent to the web server with the request */
let formValues = $(this).serialize();
// Send the form data using post
  //let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
  $.post("hostels/hostel-dm.php",formValues,function(data){
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
  title: 'Hostel Updated Successfully'
});
viewAllHostels();
}     
})
   
})
}

//get list of Fees Collection
function viewFeesCollection(){
  fetch('school-fees/viewFeesCollection.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function getChangeFeeStructure(){
  fetch("school-fees/changeFeesStructure.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function viewFeesStructure(){
  fetch("school-fees/ViewFeesStructure.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}
  
function addNewFees(){
  fetch("school-fees/changeFeesStructure.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

 
function changeFeesStructure(){
  //console.log('here we are');
  $("form").submit(function(event){
   // Stop form from submitting normally
   event.preventDefault();
   
   /* Serialize the submitted form control values to be sent to the web server with the request */
   let formValues = $(this).serialize();
   // Send the form data using post
   $.post("school-fees/fees-dm.php", formValues, function(data){
    contentWrapper.innerHTML = data;
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
        title: 'Fees Structure Changed Successfully'
                 });
         viewFeesStructure();
         }  

   });
});
}

//get list of leaves
function viewAllLeaves(){
  fetch('hr/viewFeess.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}


function getLeaveManagement(){
  fetch("hr/leaveIndex.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function deleteFees(value,classId){
  $.post("hr/hr-dm.php", {
    value: value,
    formId: classId
  },
  function(data){

    if(data == 1){
                  
      var Toast = Swal.mixin({
      toast: true,
       position: 'top',
      showConfirmButton: false,
      timer: 3000
        });
              Toast.fire({
      icon: 'error',
      title: 'Fees Deleted Successfully'
               });
       viewAllFeess();
       }   
      })
}

function deleteFeesStructure(value,classId){
  $.post("school-fees/fees-dm.php", {
    value: value,
    formId: classId
  },
  function(data){

    if(data == 1){
                  
      var Toast = Swal.mixin({
      toast: true,
       position: 'top',
      showConfirmButton: false,
      timer: 3000
        });
              Toast.fire({
      icon: 'error',
      title: 'Fees Structure Deleted Successfully'
               });
       viewFeesStructure();
       }   
      })
}


function selectUpdateFees(value,classId){

  $.post("school-fees/fees-dm.php", {
    value: value,
    formId: classId
  },
  function(data){
    contentWrapper.innerHTML = data;
  })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  }

function updateFees(){
$("form").submit(function(event){
// Stop form from submitting normally
event.preventDefault();

/* Serialize the submitted form control values to be sent to the web server with the request */
let formValues = $(this).serialize();
// Send the form data using post
  $.post("hr/hr-dm.php",formValues,function(data){
// Display the returned data in browser
console.log(formValues);
 if(data == 1){
              
  var Toast = Swal.mixin({
  toast: true,
   position: 'top',
  showConfirmButton: false,
  timer: 3000
    });
          Toast.fire({
  icon: 'success',
  title: 'Fees Updated Successfully'
});
viewAllFeess();
}     
contentWrapper.innerHTML = data;

})
   
})
}

function updateFeesStructure(){
  $("form").submit(function(event){
  // Stop form from submitting normally
  event.preventDefault();
  
  /* Serialize the submitted form control values to be sent to the web server with the request */
  let formValues = $(this).serialize();
  // Send the form data using post
    $.post("school-fees/fees-dm.php",formValues,function(data){
  // Display the returned data in browser
  console.log(formValues);
   if(data == 1){
                
    var Toast = Swal.mixin({
    toast: true,
     position: 'top',
    showConfirmButton: false,
    timer: 3000
      });
            Toast.fire({
    icon: 'success',
    title: 'Fees Structure Updated Successfully'
  });
  viewFeesStructure();
  }     
  contentWrapper.innerHTML = data;
  
  })
     
  })
  }



//get calendar
   
function getCalendar(){
  fetch('calendar_view.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;

  
 //contentWrapper.innerHTML = '';
 var date = new Date()
 var d    = date.getDate(),
     m    = date.getMonth(),
     y    = date.getFullYear()

 var Calendar = FullCalendar.Calendar;
 var Draggable = FullCalendar.Draggable;

 var calendarEl = document.getElementById('calendarEl');

 // initialize the external events
 // -----------------------------------------------------------------
//our whole calendar
 var calendar = new Calendar(calendarEl, {
   headerToolbar: {
     left  : 'prev,next today',
     center: 'title',
     right : 'dayGridMonth,timeGridWeek,timeGridDay'
   },
   themeSystem: 'bootstrap',
   eventSources: [
    // the file where the events will be fetched from
    {
      url: 'loadKevin.php',
      success: function(data) {
       console.log(data);
      },
      color: 'yellow',   // a non-ajax option
      textColor: 'black' // a non-ajax option
    }
  ]  ,

   selectable:true,
   editable  : true,
//prompt a user to input new event when a certain date is clicked
   select: function(start, end,events)
   {

    var title = prompt("Enter Event Title");
    if(title)
    {
      //console.log(start.end);

     var startTime = calendar.formatDate(start.start, {
      year: 'numeric',
      month: 'long',
      day: '2-digit',
      hour:'2-digit',
      minute: '2-digit',
      second:'2-digit'
    });
     var end = calendar.formatDate(start.end, {
            year: 'numeric',
            month: 'long',
            day: '2-digit',
            hour:'2-digit',
            minute: '2-digit',
            second:'2-digit'
          });
          //console.log(`${start} and end is ${end}`)

     $.ajax({
      url:"insertKevin.php",
      type:"POST",
      data:{title:title, start:startTime, end:end},
      success:function(data)
      {
        calendar.refetchEvents();
        alert("School Event Added Successfully");
      }
     })
    }
   },


   eventResize:function(e)
          {
          //  console.log(e.event.start);
           var start = calendar.formatDate(e.event.start, {
            year: 'numeric',
            month: 'long',
            day: '2-digit',
            hour:'2-digit',
            minute: '2-digit',
            second:'2-digit'
          });
           console.log(start);
           var end = calendar.formatDate(e.event.end, {
            year: 'numeric',
            month: 'long',
            day: '2-digit',
            hour:'2-digit',
            minute: '2-digit',
            second:'2-digit'
          });
           var title = e.event.title;
           var id = e.event.id;
           $.ajax({
            url:"updateKevin.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function(){
              calendar.refetchEvents()
              alert('Event Update');
            }
           })
          },

   eventDrop:function(e)
   {
    //  console.log(e.event.start);
     var start = calendar.formatDate(e.event.start, {
      year: 'numeric',
      month: 'long',
      day: '2-digit',
      hour:'2-digit',
      minute: '2-digit',
      second:'2-digit'
    });
     console.log(start);
     var end = calendar.formatDate(e.event.end, {
      year: 'numeric',
      month: 'long',
      day: '2-digit',
      hour:'2-digit',
      minute: '2-digit',
      second:'2-digit'
    });
     var title = e.event.title;
     var id = e.event.id;
     $.ajax({
      url:"updateKevin.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
        calendar.refetchEvents()
        alert('Event Update');
      }
     })
    },
   
   eventClick:function(e)
   {
    if(confirm("Are you sure you want to remove it?"))
    {
     var id = e.event.id;
     console.log(id);
     $.ajax({
      url:"deleteKevin.php",
      type:"POST",
      data: "&id=" + id,
      success: function (response) {
                       if(parseInt(response) > 0) {
                           $('#calendar').fullCalendar('removeEvents', id);
                           displayMessage("Deleted Successfully");
                       }
                   }
     })
    }
   },
      });

 calendar.render();
 // $('#calendar').fullCalendar()
  })
}



  //get time table
  function getTimeTable(){
    
    fetch('timetable.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
          //Initialize Select2 Elements
  
    })
}
 
function addTimeTable(){
    $( '#form' )
    .submit( function( e ) {
      $.ajax( {
        url: 'timetable-dm.php',
        type: 'POST',
        data: new FormData( this ),
        processData: false,
        contentType: false,
        success:function(data){

            var Toast = Swal.mixin({
              toast: true,
              position: 'top',
              showConfirmButton: false,
              timer: 3000
            });
                        Toast.fire({
                icon: 'success',
                title: 'New Time Table Added Successfully'
            });
            getViewTimeTables();          
        },
        error: function(r) {
        console.log(r);
        }
      } );
      e.preventDefault();
    } );
}

  //get time table
  function getViewTimeTables(){
    
    fetch('viewAllTimeTables.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
          //Initialize Select2 Elements
  
    })
}
 


//load the homepage after clicking dashboard
function loadDashboard(){
    fetch("index2.php")
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
}

function viewExamResult(){
  fetch("exam/viewExamResult.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      console.log(doc);
      contentWrapper.innerHTML = doc.innerHTML;
  })
}


function getExamCategories(){
  fetch("exam/viewExamCategories.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      console.log(doc);
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function viewBookSubmission(){
  fetch("library/viewBookSubmission.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
      $(function () {
        $("#viewBookSubmissionTable").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#viewBookSubmissionTable_wrapper .col-md-6:eq(0)');
    
      });
  })
}

function getlendNewBook(){
  fetch("library/lendNewBook.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
      //Initialize Select2 Elements
   $('.select2').select2()
    
   //Initialize Select2 Elements
   $('.select2bs4').select2({
     theme: 'bootstrap4'
   })
  })
   
}

function getLibraryStatus(){
  fetch("library/libraryStatus.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
      //Initialize Datables
      $(function () {
        $("#viewLibraryStatusTable").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#viewLibraryStatus_wrapper .col-md-6:eq(0)');
      });
  })
   
}

function lendNewBook(){

  $("form").submit(function(event){
   // Stop form from submitting normally
   event.preventDefault();
   console.log("hi");

   /* Serialize the submitted form control values to be sent to the web server with the request */
   let formValues = $(this).serialize();

   // Send the form data using post
   $.post("library/library-dm.php", formValues, function(data){
           console.log(formValues);
           contentWrapper.innerHTML =data;

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
        title: 'New Book Lend Successfully'
                 });
         viewBookSubmission();
         }  

   });
});
}

function deleteLibrary(value,classId){
  $.post("library/library-dm.php", {
    value: value,
    formId: classId
  },
  function(data){
console.log(data);
    if(data == 1){
                  
      var Toast = Swal.mixin({
      toast: true,
       position: 'top',
      showConfirmButton: false,
      timer: 3000
        });
              Toast.fire({
      icon: 'error',
      title: 'One book Deleted From Library Deleted Successfully'
               });
       viewBookSubmission();
       }   
      })
}

function selectUpdateLibrary(value,classId){

  $.post("library/library-dm.php", {
    value: value,
    formId: classId
  },
  function(data){
    
    contentWrapper.innerHTML = data;
  })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  }


function updateLibrary(){
$("form").submit(function(event){
// Stop form from submitting normally
event.preventDefault();

/* Serialize the submitted form control values to be sent to the web server with the request */
let formValues = $(this).serialize();
// Send the form data using post
  $.post("library/library-dm.php",formValues,function(data){
// Display the returned data in browser
console.log(formValues);
 if(data == 1){
              
  var Toast = Swal.mixin({
  toast: true,
   position: 'top',
  showConfirmButton: false,
  timer: 3000
    });
          Toast.fire({
  icon: 'success',
  title: 'Library Updated Successfully'
});
viewBookSubmission();
}     
})
   
})
}

function viewAllEmployees(){
  fetch('hr/viewEmployees.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
     contentWrapper.innerHTML = doc.innerHTML;

   $(function () {
    $("#viewEmployeesTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#viewEmployeesTable_wrapper .col-md-6:eq(0)');

  });

})
      
  }


function addNewEmployee(){
  fetch("hr/addNewEmployee.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

 
function addEmployee(){
  $("form").submit(function(event){
   // Stop form from submitting normally
   event.preventDefault();
   
   /* Serialize the submitted form control values to be sent to the web server with the request */
   let formValues = $(this).serialize();
   // Send the form data using post
   $.post("hr/hr-dm.php", formValues, function(data){
    contentWrapper.innerHTML = data;
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
        title: 'New Employee Added Successfully'
                 });
         viewAllEmployees();
         }  

   });
});
}
//get list of Employees
function viewAllLeaves(){
  fetch('hr/viewEmployees.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}


function getLeaveManagement(){
  fetch("hr/leaveIndex.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

  function acceptLeave(value,classId){
    $.post("hr/hr-dm.php", {
      value: value,
      formId: classId
    },
    function(data){
  
      if(data == 1){
                    
        var Toast = Swal.mixin({
        toast: true,
         position: 'left',
        showConfirmButton: false,
        timer: 3000
          });
                Toast.fire({
        icon: 'success',
        title: 'Employee Leave Accepted'
                 });
         getLeaveManagement();
         }   
        })
  }


function deleteEmployee(value,classId){
  $.post("hr/hr-dm.php", {
    value: value,
    formId: classId
  },
  function(data){

    if(data == 1){
                  
      var Toast = Swal.mixin({
      toast: true,
       position: 'top',
      showConfirmButton: false,
      timer: 3000
        });
              Toast.fire({
      icon: 'error',
      title: 'Employee Deleted Successfully'
               });
       viewAllEmployees();
       }   
      })
}

function selectUpdateEmployee(value,classId){

  $.post("hr/hr-dm.php", {
    value: value,
    formId: classId
  },
  function(data){
    contentWrapper.innerHTML = data;
  })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  }

function updateEmployee(){
$("form").submit(function(event){
// Stop form from submitting normally
event.preventDefault();

/* Serialize the submitted form control values to be sent to the web server with the request */
let formValues = $(this).serialize();
// Send the form data using post
  $.post("hr/hr-dm.php",formValues,function(data){
// Display the returned data in browser
console.log(formValues);
 if(data == 1){
              
  var Toast = Swal.mixin({
  toast: true,
   position: 'top',
  showConfirmButton: false,
  timer: 3000
    });
          Toast.fire({
  icon: 'success',
  title: 'Employee Updated Successfully'
});
viewAllEmployees();
}     
contentWrapper.innerHTML = data;

})
   
})
}

function addNewSubject(){
  fetch("subjects/addSubject.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function viewSubjects(){
  fetch("subjects/viewsubjects.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
      $(() => {
        $("#viewSubjectsTable").DataTable({
           "responsive": true,
           "lengthChange": false, 
           "autoWidth": false,
           "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#viewSubjectsTable_wrapper .col-md-6:eq(0)');
    
      });
  })
}

function addSubject(){
  $("form").submit(function(event){
   // Stop form from submitting normally
   event.preventDefault();
   
   /* Serialize the submitted form control values to be sent to the web server with the request */
   let formValues = $(this).serialize();
   // Send the form data using post
   $.post("subjects/subject-dm.php", formValues, function(data){
     console.log(formValues);
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
        title: 'New Subject Added Successfully'
                 });
         viewSubjects();
         }  

   });
});
}

function deleteSubject(value,classId){
  $.post("subjects/subject-dm.php", {
    value: value,
    formId: classId
  },
  function(data){

    if(data == 1){
                  
      var Toast = Swal.mixin({
      toast: true,
       position: 'left',
      showConfirmButton: false,
      timer: 3000
        });
              Toast.fire({
      icon: 'error',
      title: 'subject Deleted Successfully'
               });
       viewSubjects();
       }   
      })
}

function selectUpdateSubject(value,classId){

  $.post("subjects/subject-dm.php", {
    value: value,
    formId: classId
  },
  function(data){
    contentWrapper.innerHTML = data;
  })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  }

function updateSubject(){
$("form").submit(function(event){
// Stop form from submitting normally
event.preventDefault();

/* Serialize the submitted form control values to be sent to the web server with the request */
let formValues = $(this).serialize();
// Send the form data using post
  $.post("subjects/subject-dm.php",formValues,function(data){
// Display the returned data in browser
console.log(formValues);
 if(data == 1){
              
  var Toast = Swal.mixin({
  toast: true,
   position: 'top',
  showConfirmButton: false,
  timer: 3000
    });
          Toast.fire({
  icon: 'success',
  title: 'subject Updated Successfully'
});
viewSubjects();
}     
})
   
})
}

function viewBanks(){
  fetch("banks/viewBanks.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

  //get list of Banks
  function viewAllBanks(){
    fetch('banks/viewBanks.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })
}


function addNewBank(){
  fetch("banks/addNewBank.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })

}
  
function addBank(){
  $("form").submit(function(event){
   // Stop form from submitting normally
   event.preventDefault();
   
   /* Serialize the submitted form control values to be sent to the web server with the request */
   let formValues = $(this).serialize();
   // Send the form data using post
   $.post("banks/bank-dm.php", formValues, function(data){
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
        title: 'New Bank Added Successfully'
                 });
         viewBanks();
         }  

   });
});
}

function deleteBank(value,classId){
  $.post("banks/bank-dm.php", {
    value: value,
    formId: classId
  },
  function(data){

    if(data == 1){
                  
      var Toast = Swal.mixin({
      toast: true,
       position: 'top',
      showConfirmButton: false,
      timer: 3000
        });
              Toast.fire({
      icon: 'error',
      title: 'Bank Deleted Successfully'
               });
       viewBanks();
       }   
      })
}

function selectUpdateBank(value,classId){

  $.post("banks/bank-dm.php", {
    value: value,
    formId: classId
  },
  function(data){
    contentWrapper.innerHTML = data;
  })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  }

function updateBank(){
$("form").submit(function(event){
// Stop form from submitting normally
event.preventDefault();

/* Serialize the submitted form control values to be sent to the web server with the request */
let formValues = $(this).serialize();
// Send the form data using post
  $.post("Banks/bank-dm.php",formValues,function(data){
// Display the returned data in browser
console.log(formValues);
contentWrapper.innerHTML = data;

 if(data == 1){
              
  var Toast = Swal.mixin({
  toast: true,
   position: 'top',
  showConfirmButton: false,
  timer: 3000
    });
          Toast.fire({
  icon: 'success',
  title: 'Bank Updated Successfully'
});
viewBanks();
}     
})
   
})
}
