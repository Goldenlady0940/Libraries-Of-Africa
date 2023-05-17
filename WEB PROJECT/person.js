document.getElementById("edit").addEventListener("click", function(event){
    event.preventDefault(); // prevent the button from submitting the form
    document.getElementById("fname").disabled = false; // enable the textbox
    document.getElementById("lname").disabled = false; 
    document.getElementById("phone").disabled = false; 
    document.getElementById("email").disabled = false; 
    //document.getElementById("nid").disabled = false;  national id cant be modified
    // document.getElementById("country").disabled = false; 
    // document.getElementById("city").disabled = false; 
    // document.getElementById("region").disabled = false; 
    document.getElementById("user").disabled = false; 
    document.getElementById("pass").disabled = false; 
    
   
});
