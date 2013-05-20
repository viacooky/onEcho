<?php
/*
 * 前台模板 --- footer
 */
?>
<!-- HTML -->
<footer>
      <p>Copyright &copy; <a href="index.php">onEcho</a> | design from <a href="http://www.css3templates.co.uk">css3templates.co.uk</a></p>
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="template/js/jquery.js"></script>
  <script type="text/javascript" src="template/js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="template/js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>

<?php 
Sql::close();
?>