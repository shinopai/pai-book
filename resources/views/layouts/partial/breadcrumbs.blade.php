@unless ($breadcrumbs->isEmpty())

<ol class="breadcrumb flex gap-1 m-5">
    @foreach ($breadcrumbs as $breadcrumb)

    @if (!is_null($breadcrumb->url) && !$loop->last)
    <li class="breadcrumb-item hover:text-blue-500 hover:underline"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>&nbsp;/
    @else
    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
    @endif

    @endforeach
</ol>

@endunless
