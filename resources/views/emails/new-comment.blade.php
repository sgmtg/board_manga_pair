<x-mail::message>
{{ $postOwnerName }}さんの投稿に
{{ $commenterName }}さんから新しいコメントがつきました。


<x-mail::button :url="$url">
コメントを見る
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
