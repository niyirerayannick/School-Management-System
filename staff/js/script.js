
//defining function for handling events
//student handling methods


function viewAllStudents(){
    fetch("students/viewStudents.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
          $('#myTable').DataTable();
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

//classes handling methods
function viewAllClasses(){
   getContents("class/viewClasses.php");
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

  
function getClassAttendance(){
  fetch('class_attendance.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#myChart');

      var ctx = doc.getContext('2d');
      var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our  dataset
    data: {
        labels: [1,6,67,4], //the variable we created ealier,
        datasets: [{
            label: '',
            borderColor: 'rgb(255, 99, 132)',
            data: [1,6,67,4] //the variable we created ealier
        }]
    },

    // Configuration options go here
    options: {
        title: {
            display: true,
            text: 'STUDENT ATTANDANCE'
        },
        tooltips: {
            // Disable the on-canvas tooltip
            enabled: true,
      
        },
        scales: {
        yAxes: [{
            display: true,
            ticks: {
                beginAtZero: true,
                min: 0
            }
        }]
    }
    }

   });
  
      contentWrapper.innerHTML = chart;
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
  })
}

//get list of Fees Collection
function viewFeesCollection(){
 getContents("school-fees/viewFeesCollection.php");
   //Initialize Select2 Elements
   $('.select2').select2()

   //Initialize Select2 Elements
   $('.select2bs4').select2({
     theme: 'bootstrap4'
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

function getRequestLeave (){
  fetch("hr/requestLeave.php")
  .then(response =>  response.text())
  .then(html => {
      //contentWrapper.innerHTML = html
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;

      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            '3 Days'       : [moment(), moment()],
            '1 Week'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '2 Weeks' : [moment().subtract(6, 'days'), moment()],
            '1 Month': [moment().subtract(29, 'days'), moment()],

          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      $('#daterange-btn"]').click('apply.daterangepicker', function(ev, picker) {
        console.log(ev)
     });

      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
       theme: 'bootstrap4'
      })
})
}

//get calendar
  
function getCalendar(){
    /*  fetch('calendar_view.php')
      .then(response => response.text())
      .then(html =>{
          let parser = new DOMParser();
          let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
          contentWrapper.innerHTML = doc.innerHTML;
      })
      */
     contentWrapper.innerHTML = '';
       var calendar = $('#content-wrapper').fullCalendar({
        editable:true,
        header:{
         left:'prev,next today',
         center:'title',
         right:'month,agendaWeek,agendaDay'
        },
        events: 'loadKevin.php',
        selectable:true,
        selectHelper:true,
    
        select: function(start, end)
        {
         var title = prompt("Enter Event Title");
         if(title)
         {
          var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
          $.ajax({
           url:"insertKevin.php",
           type:"POST",
           data:{title:title, start:start, end:end},
           success:function()
           {
            calendar.fullCalendar('refetchEvents');
            alert("Added Successfully");
           }
          })
         }
        },
        editable:true,
        eventResize:function(event)
        {
         var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
         var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
         var title = event.title;
         var id = event.id;
         $.ajax({
          url:"updateKevin.php",
          type:"POST",
          data:{title:title, start:start, end:end, id:id},
          success:function(){
           calendar.fullCalendar('refetchEvents');
           alert('Event Update');
          }
         })
        },
    
        eventDrop:function(event)
        {
         var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
         var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
         var title = event.title;
         var id = event.id;
         $.ajax({
          url:"updateKevin.php",
          type:"POST",
          data:{title:title, start:start, end:end, id:id},
          success:function()
          {
           calendar.fullCalendar('refetchEvents');
           alert("Event Updated");
          }
         });
        },
    
        eventClick:function(event)
        {
         if(confirm("Are you sure you want to remove it?"))
         {
          var id = event.id;
          console.log(id)
          $.ajax({
           url:"deleteKevin.php",
           type:"POST",
           data: "&id=" + event.id,
           success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Deleted Successfully");
                            }
                        }
          })
         }
        },
    
       });
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
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function getAddExamResult(){
  fetch("exam/addExamResult.php")
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
      
      $('[data-mask]').inputmask()

  })
}

function addExamResult(){
  $("form").submit(function(event){
    // Stop form from submitting normally
    event.preventDefault();
    
    /* Serialize the submitted form control values to be sent to the web server with the request */
    let formValues = $(this).serialize();
    // Send the form data using post
    $.post("exam/exam-dm.php", formValues, function(data){
      console.log(data);
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
         title: 'Exam Results Added Successfully'
                  });
          viewSubjects();
          }  
 
    });
 });
}

function viewBookSubmission(){
  fetch("library/viewBookSubmission.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}

function getLibraryStatus(){
  fetch("library/libraryStatus.php")
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


//get list of Employees
function viewAllEmployees(){
  fetch('hr/viewEmployees.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
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


function viewSubjects(){
  fetch("subjects/viewsubjects.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
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

