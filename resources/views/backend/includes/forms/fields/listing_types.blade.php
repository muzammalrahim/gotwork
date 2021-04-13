<div class="font-bold text-base"> Listing Types </div>
<div class="block text-sm">
  <div class="mt-2">
    @foreach($listing_types as $listing_type)
      <div>
        @if($filter_listing_types == null)
          <label class="inline-flex items-center">
            <input type="checkbox" name="search_listing_types[]" class="form-checkbox cursor-pointer search_project_by_listing_types" value="{{ $listing_type->id }}">
            <span class="ml-2">{{ $listing_type->title }}</span>
          </label>
        @else
          <label class="inline-flex items-center">
          <input type="checkbox" name="search_listing_types[]" class="form-checkbox cursor-pointer search_project_by_listing_types" value="{{ $listing_type->id }}" {{ in_array($listing_type->id, $filter_listing_types) ? "checked" : "" }} >
          <span class="ml-2">{{ $listing_type->title }}</span>
        </label>
        @endif
      </div>
    @endforeach
  </div>
</div>