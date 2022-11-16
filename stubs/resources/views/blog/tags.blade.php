
<select class="form-control select2" name="tags[]" id="tags" multiple="multiple">
    @foreach ($tags as $tagId => $tagName )
        <option value="{{$tagName}}" data-option-id="{{$tagId}}" @if(in_array($tagName,$selected)) selected @endif>{{$tagName}}</option>
    @endforeach
</select>

@push('css')
<script>
    $(document).ready(function () {
        $('#tags').select2({
            tags: true,
            placeholder: "{{__('blog.tags')}}",
            allowClear: true
        });
    });
</script>
@endpush