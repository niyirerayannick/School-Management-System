
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


function viewStudentDetails(value,studentId){
  $.post("students/student-dm.php", {
    value: value,
    formId: studentId
  },  function(data){
    // Display the returned data in browser
   if(data == 1){
          
    contentWrapper.innerHTML = data;
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

      //viewAllStudents();
   }else {
     contentWrapper.innerHTML = data;
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

