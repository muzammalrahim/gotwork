<div class="font-bold text-base"> Skills </div>
<div class="block text-sm">
  <div class="mt-2">
    @foreach($skills_list as $skill)
      <div>
        @if($filter_listing_skills == null)
          <label class="inline-flex items-center">
            <input type="checkbox" name="search_project_skills[]" class="form-checkbox cursor-pointer search_project_by_skills" value="{{ $skill->id }}">
            <span class="ml-2">{{ $skill->name }}</span>
          </label>
        @else
          <label class="inline-flex items-center">
          <input type="checkbox" name="search_project_skills[]" class="form-checkbox cursor-pointer search_project_by_skills" value="{{ $skill->id }}" {{ in_array($skill->id, $filter_listing_skills) ? "checked" : "" }} >
          <span class="ml-2">{{ $skill->name }}</span>
        </label>
        @endif
      </div>
    @endforeach
  </div>
</div>