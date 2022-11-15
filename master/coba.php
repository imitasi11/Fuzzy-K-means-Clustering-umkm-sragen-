<html>
    <head>
        <script type="text/javascript">
                function isLatitude(lat) {
  return isFinite(lat) && Math.abs(lat) <= 90;
}

function isLongitude(lng) {
  return isFinite(lng) && Math.abs(lng) <= 180;
}
function checkIfCaseExists() {
    var form_valid = false;
     var lat = document.getElementById("lat").value;
    var lng = document.getElementById("lng").value;
    if (isLatitude(lat)&&isLongitude(lng)) {
        return true;

    }else{
        alert('Silahkan isi ulang latitude dan longitude anda, gunakan (.) untuk angka desimal');
        return false;
    }
    //whatever condition you want to check
    if(true){
      form_valid = true;
    }

    return form_valid;
  }

            function submiBtnClick(){
             
            }
        </script>
    </head>
    <body>
        <form id="post-form" method="POST" action="example.com" onsubmit="return checkIfCaseExists()">
            <input type="text" id="lat" name="Name" >
            <input type="text" id="lng" name="Age" required="true">
            <input type="text" name="city" required="false">
            <input type="submit" name="Submit">
        </form>
    </body>
</html>