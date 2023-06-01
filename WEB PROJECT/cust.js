// // var p=document.body.firstChild.nextSibling.nextSibling.nextSibling.firstChild.nextSibling
// // p.innerHTML='changed'
// // p.textContent='changed'

// // we dont  need this page
// // var element = document.getElementById("myElement");
// // element.textContent = " $_SESSION['Count'] ";

// // Create a new XMLHttpRequest object
// var xhr = new XMLHttpRequest();

// // Define the PHP script URL and parameters
// var url = "set_session.php";
// var params = "Count=" + <?php echo json_encode($_SESSION['Count']); ?>;

// // Open the connection
// xhr.open("POST", url, true);

// // Set the content type for the request
// xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// // Send the request with the parameters
// xhr.send(params);
