<div class="sidebar__item">
    <h4>Department</h4>
    @foreach(\App\Category::all() as $category)
       <li><a href="{{$category->getCategoryUrl()}}">{{$category->__get("category_name")}}</a></li>
    @endforeach
</div>
