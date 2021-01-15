
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

/*
function viewStudentDetails(value,studentId){
  $.post("students/student-dm.php", {
    value: value,
    formId: studentId
  },  function(data){
    contentWrapper.innerHTML = data;
    // Display the returned data in browser
   if(data == 1){

      //viewAllStudents();
   }else {
     contentWrapper.innerHTML = data;
   }
});
}
*/
function mergeSubjects(arr){
  let subjects = [];
  for(let i =0 ; i < arr.length ; i++){
     subjects.push(arr[i][0])
   }
    return [...new Set(subjects)];
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
                  attendance.splice(i, 0, "0");            
                }
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
    fetch("teachers/viewTeachers.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
  })
  }
 
//classes handling methods
function viewAllClasses(){
    fetch("class/viewClasses.php")
    .then(response =>  response.text())
    .then(html => {
        //contentWrapper.innerHTML = html
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
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
  fetch('school-fees/viewFeesCollection.php')
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
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
      backgroundColor: '#00c0ef', //Info (aqua)
      borderColor    : '#00c0ef' ,//Info (aqua)
      color: 'yellow',   // a non-ajax option
      textColor: 'black' // a non-ajax option
    }
  ]  ,

  showNonCurrentDates:false,
  businessHours: {
    // days of week. an array of zero-based day of week integers (0=Sunday)
    daysOfWeek: [ 1, 2, 3, 4 ,5], // Monday - Friday
    startTime: '07:00', // a start time (10am)
    endTime: '18:00', // an end time (6pm )
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
           // console.log(data)
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

function viewExam(){
  fetch("exam/exams.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      console.log(doc);
      contentWrapper.innerHTML = doc.innerHTML;
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


function viewSubjects(){
  fetch("subjects/viewsubjects.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}


function viewBanks(){
  fetch("viewBanks.php")
  .then(response => response.text())
  .then(html =>{
      let parser = new DOMParser();
      let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
      contentWrapper.innerHTML = doc.innerHTML;
  })
}
