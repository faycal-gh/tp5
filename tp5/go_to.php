<?php

?>
<link rel="stylesheet" href="go_to.css">
<div class="cards">
  <div class="card" id="taxi">
    <article>
      <h2>TAXI PAGE</h2>
      <div class="pic"><img src="images/taxi.jpg"></div>
      <div class="desc">Click here to go to <b> TAXI PAGE </b></div>
    </article>
  </div>
  <div class="card" id="client">
    <article>
      <h2>CLIENT PAGE</h2>
      <div class="pic"><img src="images/client.jpg"></div>
      <div class="desc">Click here to go to <b> CLIENT PAGE </b></div>
    </article>
  </div>
  <div class="card" id="course">
    <article>
      <h2>COURSE PAGE</h2>
      <div class="pic"><img src="images/course.jpg"></div>
      <div class="desc">Click here to go to <b> COURSE PAGE </b></div>
    </article>
  </div>
</div>
<script>
  const taxi = document.querySelector('#taxi');
  const client = document.querySelector('#client');
  const course = document.querySelector('#course');
  taxi.addEventListener('click', function(event) {
    window.location.replace('http://localhost/tp5/taxi.php');
  });
  client.addEventListener('click', function(event) {
    window.location.replace('http://localhost/tp5/client.php');
  });
  course.addEventListener('click', function(event) {
    window.location.replace('http://localhost/tp5/course.php');
  });
</script>
