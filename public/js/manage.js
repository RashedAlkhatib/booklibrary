
$(document).ready(function() {
 
    $('#x').DataTable({
      
        "processing": true,
        "serverSide": true,
        "ajax":  "/CustomeClasses/getData.php",
        type:   "POST",
        columnDefs: [{
            targets: 1,
            render: function(data, type, row, meta) {
                return '<image src="' + data +
                    '" alt="No Image" class="mr-3 mt-2 rounded-circle" style="width:150px;">';
            }
            
        }, {
            targets: 6,
            render: function(data, type, row, meta) {
 
 
if(row[5]==null ||row[7]==null){ 
     row[5]="";
    row[7]=""; }
 
var label=labell;
var arr1=label.split(",");
var arr2=row[5].split(",");
var unique1 = arr1.filter((o) => arr2.indexOf(o) === -1);
var unique2 = arr2.filter((o) => arr1.indexOf(o) === -1);

var label = unique1.concat(unique2);

var label_id=labellid;
var arr1=label_id.split(",");
var arr2=row[7].split(",");
var unique1 = arr1.filter((o) => arr2.indexOf(o) === -1);
var unique2 = arr2.filter((o) => arr1.indexOf(o) === -1);

  label_id = unique1.concat(unique2);

 
//authors


var Authors_id= authorid;
var Authors=authorr;


 var uniqid=Date.now();
 var parms="'#"+uniqid+"edit'";
 var showdelete="'delx"+row[0]+"','"+row[0]+"'";
 
 var showedit="'edit"+row[0]+"','"+row[0]+"','"+row[1]+"','"+row[2]+"','"+row[8]+"','"+Authors+"','"+Authors_id+"','"+row[3]+"','"+row[4]+"','"+row[5]+"','"+row[7]+"','"+label+"','"+label_id+"','"+uniqid+"image','"+uniqid+"files'";
 
 
var x='<button type="button" onclick="showdelete('+showdelete+')" class="btn btn-danger" data-toggle="modal" data-target="#delx'+row[0]
    +'">Delete Book</button><button onclick="showedit('+showedit+')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'+row[0]+'">edit book</button>';
 
 return x;
            }
        }]
    });


});

 

function delform() {
    
    var uniqid=Date.now();
   
 var form = $("#delform").serializeArray();
 
 
 
     $.ajax({
         type: "POST", //type of method
         url: delete_url, //your page
       
        data:  $.param(form), // passing the values
  
         success: function(data) {
            
             refresh();
 
         }
     });
     
    
 }
 function runform(parms) {
 
    var form = $(parms).get(0);
    
    var formData = new FormData(form);
    
        $.ajax({
            type: "POST", //type of method
            url: create_url, //your page
        
           data: formData, // passing the values
           processData: false,
        contentType: false,
            success: function(data) {
               $(parms).trigger("reset");
            
                refresh();
    
            }
        });
        
       
    }
    function editform(parms) {
 
        var form = $(parms).get(0);
        
        var formData = new FormData(form);
        
            $.ajax({
                type: "POST", //type of method
                url: edit_url, //your page
            
               data: formData, // passing the values
               processData: false,
            contentType: false,
                success: function(data) {
                   $(parms).trigger("reset");
            
                    refresh();
        
                }
            });
            
           
        }
    

function showedit(id,book_id,image_name,unique_author,unique_author_id,author,author_id,title,description,unique_label,unique_label_id,label,label_id,img,file) {
 
resetid();
 
if(image_name!=''){
 
document.getElementsByClassName('image')[0].style.display='block';

document.getElementsByClassName('showhide')[0].style.display='none';

document.getElementById('image_id').src=image_name;
document.getElementById('show_img').disabled=true;
 

}  if (image_name=='' || image_name==null|| image_name=='null'){
   
   document.getElementsByClassName('showhide')[0].style.display='block';
   document.getElementsByClassName('image')[0].style.display='none';
   document.getElementById('show_img').disabled=false;
}
 
    document.getElementById('editmodal').id = id;
 
      //for hidden values 

    document.getElementById("editid").value = book_id;

    //setting values
    
    document.getElementById('title_id').value = title;
 
var values = unique_label_id.split(',');
 
var label_id = label_id.split(',');

   select = document.getElementById('label_id');

   for (var i = 0; i<values.length; i++){
if(unique_label.split(',')[i]!=""){
   var opt = document.createElement('option');
   opt.value = values[i];
   opt.innerHTML = unique_label.split(',')[i];
   opt.selected=true;
   select.appendChild(opt);
}
}
for (var i = 0; i<label_id.length; i++){
   if(label.split(',')[i]!=""){
   var opt = document.createElement('option');
   opt.value = label_id[i];
   opt.innerHTML = label.split(',')[i];
   opt.selected=false;
   select.appendChild(opt);
   }
}
 

// author control

var values_author = unique_author_id.split(',');
 
 var author_id = author_id.split(',');
 
   select_author = document.getElementById('author_id');
 
   var optauthor = document.createElement('option');
   optauthor.value = values_author;
   optauthor.innerHTML = unique_author;
   optauthor.selected=true;
   select_author.appendChild(optauthor);

 
for (var i = 0; i<author_id.length; i++){
   if(author.split(',')[i]!="" && author.split(',')[i]!=unique_author ){
   var optauthor = document.createElement('option');
   optauthor.value = author_id[i];
   optauthor.innerHTML = author.split(',')[i];
   optauthor.selected=false;
   select_author.appendChild(optauthor);
   }
} 
 
    document.getElementById('descreption_id').value = description;
    document.getElementById('show_img').setAttribute('onclick',"showselectedimg('image_id','show_img')");

  
 
 
}

function showdelete(id,data) {
resetid();
    document.getElementById('deletemodal').id = id;
    document.getElementById('deleteid').id = "deleteid"+id+"";
    document.getElementById("deleteid"+id+"").value = data;
   
}  

function resetid(){
 
$('#label_id').find('option').remove().end();
$('#author_id').find('option').remove().end();

var els = document.getElementsByClassName('modal fade');
for (var i = 1; i < els.length; i++ ) {
  
document.getElementsByClassName('modal fade')[i].id='deletemodal';

}

document.getElementById('image_id').src="";
document.getElementsByClassName('modal fade top')[0].id='editmodal';
document.getElementsByClassName('deleteclass')[0].id  ="deleteid";
document.getElementsByClassName('deleteformclass')[0].id  ="delform";
document.getElementsByClassName('editformclass')[0].id  ="editform";
}

function showselectedimg(img_id,file_id){
    document.getElementById(file_id).onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementsByClassName('image')[0].style.display="block";
        document.getElementById(img_id).src = e.target.result;
        document.getElementsByClassName('showhide')[0].style.display="none";
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};


}
 
function changecurrentimg(){


document.getElementsByClassName('image')[0].style.display="none";
document.getElementsByClassName('showhide')[0].style.display="block";
document.getElementById('show_img').value = '';
document.getElementById('show_img').disabled=false;

}

function refresh() {

$('#x').DataTable().ajax.reload();
var appBanners = document.getElementsByClassName('modal-backdrop fade show');

for (var i = 0; i < appBanners.length; i ++) {
appBanners[i].style.display = 'none';
}
resetid();
}