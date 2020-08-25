 
function showform(del_id) {
    document.getElementById(del_id).style.display = "block";
}

function hideform(del_id) {
    document.getElementById(del_id).style.display = "none";
}

function delform(op, label_id) {

    $.ajax({
        type: "POST", //type of method
        url: delete_url, //your page
        data: {
            id: label_id,
            op_type: op
        }, // passing the values
        success: function(res) {
          
            refresh();

        }
    });

}
function editform(op, label_id, Lable ) {
  
    $.ajax({

type: "POST", //type of method
url: edit_url, //your page
data: {
    op_type: op,
    id: label_id,
    Labels: document.getElementById(Lable).value 


}, // passing the values
success: function(res) {
  
    refresh();

}
});

}

function createform(op, Lable ) {
      $.ajax({

type: "POST", //type of method
url: create_url, //your page
data: {
    op_type: op,
    Labels: document.getElementById(Lable).value 
  

}, // passing the values
success: function(res) {

    refresh();

}
}); }
 
function refresh() {

    $("#table").load(index_url+" #table");
    var appBanners = document.getElementsByClassName('modal-backdrop fade show');

for (var i = 0; i < appBanners.length; i ++) {
    appBanners[i].style.display = 'none';
}

}
