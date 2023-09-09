var selectedRow = null;

//show alerts
function showAlert(message, className){
    const div = document.createElement("div"); 
    div.className = `alert alert-${className}`;
    div.appendChild(document.createTextNode(message));
    const container = document.querySelector(".container");
    const main = document.querySelector(".main");
    container.insertBefore(div, main);

    setTimeout(() =>document.querySelector(".alert").remove(),3000);
}

 //clear all fields.
     function clearFields(){
         document.querySelector("#firstname").value="";
         document.querySelector("#lastname").value="";
         document.querySelector("#idnumber").value="";
     }

 //Add data
 document.querySelector("#student-form").addEventListener("submit",(e) =>{
     e.preventDefault();
     //get form values
     const firstname = document.querySelector("#firstname").value;
     const lastname = document.querySelector("#lastname").value;
     const idnumber = document.querySelector("#idnumber").value;

//     //validate
     if(firstname == "" || lastname == "" || idnumber == ""){
         showAlert("please fill in all fields","danger");
     }
     else{
         if(selectedRow == null){
             const list = document.querySelector("#student-list");
             const row = document.createElement("tr");

             row.innerHTML = `
             <td>${firstname}</td>
             <td>${lastname}</td>
             <td>${idnumber}</td>
             <td>
             <a href="#" class="btn btn-warning btn-sm edit">Edit</a>
                   <a href="#" class="btn btn-danger btn-sm delete">delete</a>
                   `;
                list.appendChild(row);
                selectedRow = null;
                showAlert("student Added", "success");
         }
         else{
            selectedRow.children[0].textcontent = firstname;
            selectedRow.children[1].textcontent = lastname;
            selectedRow.children[2].textcontent = idnumber;
            selectedRow = null;
            showAlert("student Info edited", "info");
         }
         clearFields ();
     }
 });

 //edit data
 document.querySelector("#student-list").addEventListener("click",(e) =>{
    target = e.target;
    if(target.classList.contains("edit")){
        selectedRow = target.parentElement.parentElement;
        document.querySelector("#firstname").value = selectedRow.children[0].textcontent;
        document.querySelector("#lastname").value = selectedRow.children[1].textcontent;
        document.querySelector("#idnumber").value = selectedRow.children[2].textcontent;
    }
 });

//delete data
document.querySelector("#student-list").addEventListener("click",(e) => {
    target = e.target;
    if(target.classList.contains("delete")){
        target.parentElement.parentElement.remove();
        showAlert("student data deleted","danger");
    }
});