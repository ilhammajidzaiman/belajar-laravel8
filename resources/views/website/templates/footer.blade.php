</div>
</section>

<div class="container-xxl">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="me-3 text-muted text-decoration-none lh-1">
                <img src="{{ url('assets/images/imz-icon.svg' )}}" alt="image.png" height="24">
            </a>
            <small class="text-muted">
                Copyright &copy;
                <?= date('Y'); ?>
                <a href="{{ url('/') }}; ?>">
                    <b>laravel-8</b>
                </a>
                <br>
                powered by-<i>laravel-8</i>.
            </small>
        </div>


        <ul class=" nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
                <a class="text-muted" href="#">
                    <i class="fa-fw fab fa-twitter"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="#">
                    <i class="fa-fw fab fa-instagram"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-muted" href="#">
                    <i class="fa-fw fab fa-facebook"></i>
                </a>
            </li>
        </ul>
    </footer>
</div>

<script src="{{ url('/') }}/assets/js/script.js"></script>
<script src="{{ url('/') }}/plugin/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('/') }}/plugin/js/jquery-3.4.1.slim.min.js"></script>
<script src="{{ url('/') }}/plugin/summernote-0.8.18-dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'tulis artikel disini',
        tabsize: 2,
        height: 500
        });
</script>

</body>

</html>