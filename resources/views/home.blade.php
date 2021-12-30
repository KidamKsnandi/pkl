@if(Auth::user()->hasRole('admin'))
    <script>window.location = "/admin/";</script>
@endif
