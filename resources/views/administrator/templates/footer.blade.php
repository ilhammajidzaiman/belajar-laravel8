</div>
</div>
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

{{-- <script src="{{ url('/') }}/assets/js/script.js"></script> --}}
{{-- <script src="{{ url('/') }}/plugin/js/jquery-3.4.1.slim.min.js"></script> --}}
{{-- <script src="{{ url('/') }}/plugin/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script> --}}
{{-- <script src="{{ url('/') }}/plugin/summernote-0.8.18-dist/summernote-lite.min.js"></script> --}}

<script src="https://getbootstrap.com/docs/5.1/examples/offcanvas-navbar/offcanvas.js"></script>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
    function test()
    {
    let content = $('#summernote').text().toLowerCase();
    $('#summernote').text(content);
    } 
    $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 400,
            toolbar: [
                ['view', ['undo', 'redo']],
                ['style', ['style', 'fontname']],
                ['font', ['bold', 'italic', 'underline', 'color']],
                ['para', ['ul', 'ol', 'paragraph', 'strikethrough', 'superscript', 'subscript']],
                ['table', ['table']],
                ['insert', ['hr', 'link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['clear', ['clear']],
            ]
        });
</script>

</body>

</html>