function pop_up_window() {
  document.getElementById("pop_up").style.display = "block";
  console.log("hoano ny kankana");
}

window.onload = ()=>{
console.log("hello");
/* For drop file*/
const dropContainer = document.getElementById("dropcontainer");
const fileInput = document.getElementById("images");

dropContainer.addEventListener("dragover", (e) => {
  // prevent default to allow drop
  e.preventDefault();
}, false);

dropContainer.addEventListener("dragenter", () => {
  dropContainer.classList.add("drag-active");
});

dropContainer.addEventListener("dragleave", () => {
  dropContainer.classList.remove("drag-active");
});

dropContainer.addEventListener("drop", (e) => {
  e.preventDefault();
  dropContainer.classList.remove("drag-active");
  fileInput.files = e.dataTransfer.files;
});
/**/

window.WebSocket = window.WebSocket || window.MozWebSocket;


var conn = new WebSocket("ws://0.0.0.0:9999");
conn.onopen = function(e) {
    console.log("Connection established!");
};
conn.onmessage = function(e) {
    console.log("Error Occured!");
    console.log(e.data);
};

}
