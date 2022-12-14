<?php
    
    print_r( $_SESSION['user']['nie']);
    
?>
<script type="text/javascript">
//window.location.href = 'prueba/api.php?nie=<?php echo $_SESSION['nie']; ?>';
    window.location.href = 'http://cpd.iesgrancapitan.org:9281/api.php?nie=<?php echo $_SESSION['user']['nie']; ?>';
</script>