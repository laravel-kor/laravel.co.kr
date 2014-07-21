<select name="category" id="inputCategory">
  @if (Auth::user()->hasAnyRole(array('admin','super')))
  <option value="notice" {{ Input::old('category', $category) == 'notice' ? 'selected' : '' }}>공지사항</option>
  @endif
  <option value="free" {{ Input::old('category', $category) == 'free' ? 'selected' : '' }}>자유게시판</option>
  <option value="tuts" {{ Input::old('category', $category) == 'tuts' ? 'selected' : '' }}>Laravel 강좌게시판</option>
  <option value="tips" {{ Input::old('category', $category) == 'tips' ? 'selected' : '' }}>Laravel 팁게시판</option>
  <option value="help" {{ Input::old('category', $category) == 'help' ? 'selected' : '' }}>Laravel 질문게시판</option>
  <option value="packages" {{ Input::old('category', $category) == 'packages' ? 'selected' : '' }}>Laravel 패키지</option>
  <option value="sites" {{ Input::old('category', $category) == 'sites' ? 'selected' : '' }}>Laravel 사이트 소개</option>
  <option value="jobs" {{ Input::old('category', $category) == 'jobs' ? 'selected' : '' }}>구인구직</option>
</select>