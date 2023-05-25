fetch('cities.json')
.then(response => response.json())
.then(data => {
  data.forEach (myfnct)
})
.catch(error => {
  console.log('Error:', error);
});
function myfnct (item) {
    option = document.createElement("option");
    option.value = option.text = item.ville;
    document.getElementById('ville').appendChild(option);
}

var loadFile = function(event, idSRC) {
  var output = document.getElementById(idSRC);
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
};

$(document).ready(function () {
  $('#table').DataTable({
      pagingType: 'full_numbers',
  });
});