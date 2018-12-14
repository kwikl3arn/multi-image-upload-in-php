 <?php include('moveimage.php');?>
<html>
<body>

<p>for every 3 secons page reload.</p>



<p id="demo"></p>

<script>
setInterval(function(){ myFunction(); }, 5000);
function myFunction() {
    var d = new Date();
    var n = d.toLocaleTimeString();
   
    document.getElementById("demo").innerHTML = n;
}
</script>

</body>
</html>
