<span class="font-bold">Project Type</span>
<div class="mt-2">
  
  @foreach($project_types as $project_type)
      <div>
        @if($filter_project_types == null)
          <label class="inline-flex items-center">
            <input type="checkbox" name="search_project_types[]" class="form-checkbox cursor-pointer search_project_types" value="{{ $project_type->id }}" >
            <span class="ml-2">{{ $project_type->name }} Projects</span>
          </label>
        @else
          <label class="inline-flex items-center">
            <input type="checkbox" id="search_project_types" name="search_project_types[]" class="form-checkbox cursor-pointer search_project_types" value="{{ $project_type->id }}" {{ in_array($project_type->id, $filter_project_types) ? "checked" : "" }} >
            <span class="ml-2">{{ $project_type->name }} Projects</span>
          </label>
        @endif
      </div>
  @endforeach
</div>