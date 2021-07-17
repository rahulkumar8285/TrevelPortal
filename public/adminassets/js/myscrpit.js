// document.querySelector('#status').addEventListener('click', () => {
//     // document.getElementById('sidebar').classList.toggle('active');
//     var overall = document.querySelector('input[id="status"]');
//     var id = overall['value'];  
//     document.getElementById("deleteid").value = id;   
// });

function activeac(self){
    var id = self.getAttribute("data-id");
    document.getElementById("form-delete-user").deleteid.value = id;
}

function deactive(self){
    var id = self.getAttribute("data-id");
    document.getElementById("deactiveform").deleteid.value = id;
}

// function deactive(self){
//     alert('function run');
//     var id = self.getAttribute("data-id");
//     document.getElementById("form-delete-user").deleteid.value = id;
//    alert(id);
// }




