@section('script')
  <script type="text/javascript">
$('#title').on('blur', function() {
      var theTitle = this.value.toLowerCase().trim(),
          slugInput = $('#slug');
          theSlug = theTitle.replace(/[^a-z0-9-]+/g, '-')
                            .replace(/\-\-+/g, '-')
                            .replace(/\-\-+/g, '-')
                            .replace(/^-+|-+$/g, '')
                            .replace(/&/g, '-and-');

          slugInput.val(theSlug);
    });
  </script>
@endsection