function selectRow(i1,i2,i3)
{
	var flight_name=i1;
  var flight_date=i2;
  var passengers = i3;

  //alert(flight_name);
  //alert("I am here!!");
	//var r=document.getElementById("name"+id).value;
	//alert(r);
	//alert("The tour id is "+id);
   var xmlhttp;
	var str;
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","addToList.php?flight_name="+flight_name+"&flight_date="+flight_date+"&passengers="+passengers,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          alert(str);
		  //window.location.href = 'movierating.php#band';
            }
        }
      
        xmlhttp.send();
   
} 