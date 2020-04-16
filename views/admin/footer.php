</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script>
  const msg = "<? echo isset($msg) ? $msg : ''?>"; 
</script>

<script>
  $(document).ready(function(){
    if (msg != '') {
      
      $('#text-msg-modal').html(msg);
      $('#msg-modal').modal('show');
      
    }
  });
</script>

<script src="<?php echo URL . 'src/js/app.js'?>"></script>

</body>
</html>