<img src=" {{ \App\Models\SiteInfo::find(1)->logo ?? "" }}" width="{{ $width ?? '284' }}" style="object-fit: contain;"
    class="overflow-hidden" />