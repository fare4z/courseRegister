</div>
</div>
</div>
</div> <!-- Close content-wrapper -->

<footer class="footer bg-dark text-white text-center py-4">
    <div class="container">
        <p>&copy; <?php echo date("Y"); ?> Fareez. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<?php 
if (isset($_SESSION['_flash'])) { ?>
<script>
    Swal.fire({
        title: '<?=$_SESSION['_flash']['msg']?>',
        icon: '<?php echo $_SESSION['_flash']['type'];?>',
        draggable: true,
        timer : 2000,
    });
</script>
<?php 
unset($_SESSION['_flash']);
} ?>

<script>
    
</body>

</html>