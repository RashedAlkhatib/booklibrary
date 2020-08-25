 
 function delform(op, data) {
     $.ajax({
         type: "POST", //type of method
         url: delete_url, //your page
         data: {
             id: data,
             op_type: op
         }, // passing the values
         success: function(res) {
             refresh();
 
         }
     });
 
 }
 function editform(op, author_id, author, email) {
     $.ajax({
 
         type: "POST", //type of method
         url: edit_url, //your page
         data: {
             op_type: op,
             id: author_id,
             Authorname_Author: document.getElementById(author).value,
             Authoremail_Author: document.getElementById(email).value
 
         }, // passing the values
         success: function(res) {
         
             refresh();
 
         }
     });
 
 
 
 }
 
 function createform(op, author, email) {
     if(validateEmail(document.getElementById(email).value)==true){ $.ajax({
 
 type: "POST", //type of method
 url: create_url, //your page
 data: {
     op_type: op,
     Authorname_Author: document.getElementById(author).value,
     Authoremail_Author: document.getElementById(email).value
 
 }, // passing the values
 success: function(res) {
   
     document.getElementById(author).value="";
             document.getElementById(email).value="";
             refresh();
 
 }
 });}else alert("wrong email formation !")
    
 }
 
 
 function refresh() {
 
        $("#table").load(index_url+" #table");
 
     var appBanners = document.getElementsByClassName('modal-backdrop fade show');
 
 for (var i = 0; i < appBanners.length; i ++) {
     appBanners[i].style.display = 'none';
 }
   
 
 }
 
 
 
 function validateEmail(email) {
     var re =
         /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
 
     return re.test(email);
 
 }
 